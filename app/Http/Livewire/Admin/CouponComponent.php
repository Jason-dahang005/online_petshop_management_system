<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\coupon;

class CouponComponent extends Component
{
    public  $code,
            $type,
            $value,
            $cart_value;
    
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupon-component',['coupons' => $coupons])->layout('layouts.admin', ['title'=>'Admin Coupons']);
    }

// STORE
    public function OpenAddCouponModal(){
		$this->dispatchBrowserEvent('OpenAddCouponModal');
	}

    public function storeCoupon(){
        
		$this->validate([
			'code'          => 'required|unique:coupons',
            'type'          => 'required',
			'value'         => 'required|numeric',
            'cart_value'    => 'required|numeric'
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

