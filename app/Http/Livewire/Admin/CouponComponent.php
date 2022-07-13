<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\coupon;

class CouponComponent extends Component
{
    public  $code,
            $type,
            $value,
            $cart_value;
    
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin-coupons-component',['coupons' => $coupons])->layout('layouts.admin', ['title'=>'Coupons']);
    }

// STORE
    public function OpenAddCouponModal(){
		$this->dispatchBrowserEvent('OpenAddCouponModal');
	}

    public function store(){
        
		$this->validate([
			'code'          => 'required|unique:coupons',
            'type'          => 'required',
			'value'         => 'required|numeric',
            'cart_value'    => 'required'
		]);

		$coupon = new Coupon();
		$coupon->code         = $this->code;
        $coupon->type         = $this->type;
		$coupon->value        = $this->value;
        $coupon->cart_value   = $this->cart_value;
		$pc = $coupon->save();
        
		if ($pc) {
            
			$this->dispatchBrowserEvent('CloseAddCouponModal');
		}
	}
}
