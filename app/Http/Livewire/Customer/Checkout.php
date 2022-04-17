<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Auth;
use Cart;
use Stripe;

class Checkout extends Component
{
    public $fullname;
    public $mobile;
    public $address;
    public $province;
    public $city;
    public $barangay;
    public $zipcode;

    public $paymentmode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function placeOrder(){
        $this->validate([
            'fullname' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if ($this->paymentmode == 'card') {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }

        $order = new Order();
        $order->user_id     = Auth::user()->id;
        $order->subtotal    = session()->get('checkout')['subtotal'];
        $order->discount    = session()->get('checkout')['discount'];
        $order->tax         = session()->get('checkout')['tax'];
        $order->total       = session()->get('checkout')['total'];
        $order->fullname    = $this->fullname;
        $order->mobile      = $this->mobile;
        $order->address     = $this->address;
        $order->province    = $this->province;
        $order->city        = $this->city;
        $order->barangay    = $this->barangay;
        $order->zipcode     = $this->zipcode;
        $order->status      = 'pending';
        $order->save();

        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id =  $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        }
        elseif ($this->paymentmode == 'card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try{
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'        => $this->card_no,
                        'exp_month'     => $this->exp_month,
                        'exp_year'      => $this->exp_year,
                        'cvc'           => $this->cvc,
                    ]
                ]);

                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->fullname,
                    'phone' => $this->mobile,
                    'address' => [
                        'state' => $this->province,
                        'city' => $this->city,
                        'postal_code' => $this->zipcode,
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'PHP',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no.'.$order->id,
                ]);

                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'succeeded');
                    $this->resetCart();
                }
                else{
                    session()->flash('stripe_error', 'Error in transaction!');
                    $this->thankyou = 0;
                }
            }catch(Exception $e){
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
    }

    public function resetCart(){
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status){
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->paymentmode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verefiedForCheckout(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        elseif ($this->thankyou) {
            return redirect()->route('customer.thankyou');
        }
        elseif (!session()->get('checkout')) {
            return redirect()->route('customer.shopping-cart');
        }
    }

    public function render()
    {
        $this->verefiedForCheckout();
        return view('livewire.customer.checkout')->layout('layouts.customer');
    }
}
