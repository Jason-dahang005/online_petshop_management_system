<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShoppingCart extends Component
{
    use LivewireAlert;

    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function decreaseQuantity($rowId){   
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function destroy($rowId){
        $this->alert('question', 'How are you today?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Good',
            'onConfirmed' => 'confirmed' 
        ]);
        Cart::instance('cart')->remove($rowId);
        session()->flash('addToCart', 'Item Successfully Removed From Cart');
        $this->emitTo('customer.cart-count', 'refreshComponent');
        
    }

    public function checkout(){
        if (Auth::check()) {
            return redirect()->route('customer.checkout');
        }else{
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout(){
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;    
        }

        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount,
            ]);
        }else{
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.customer.shopping-cart')->layout('layouts.customer');
    }
}
