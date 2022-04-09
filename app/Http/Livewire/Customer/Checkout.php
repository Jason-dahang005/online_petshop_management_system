<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Auth;
use Cart;

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
        $order->status      = 'ordered';
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
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->paymentmode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
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
