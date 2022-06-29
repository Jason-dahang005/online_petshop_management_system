<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\coupon;

class CouponComponent extends Component
{
    public  $code,
            $type,
            $value,
            $cart_value,
            $upd_code,
            $upd_type,
            $upd_value,
            $upd_cart_value,
            $status,
            $upd_id;
    
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

// Update
        public function OpenEditCouponModal($id){
            $upd_coup               = Coupon::find($id);
            $this->upd_code             = $upd_coup->code;
            $this->upd_type             = $upd_coup->type;
            $this->upd_value            = $upd_coup->value;
            $this->upd_cart_value       = $upd_coup->cart_value;
            $this->status               = $upd_coup->status; 
            $this->upd_id               = $upd_coup->id;
            $this->dispatchBrowserEvent('OpenEditCouponModal',[
                'id' => $id
            ]);
        }

        public function updateCoupon(){
             $upd_id = $this->upd_id;
            $this->validate([
                'upd_code'          => 'required|unique:coupons,code,'.$upd_id,
                'upd_type'          => 'required',
                'upd_value'         => 'required|numeric',
                'upd_cart_value'    => 'required|numeric',
                'status'            => 'required'
            ],[
                'upd_code.unique'=>'code already exist'
            ]);
    
            $coupon = Coupon::find($upd_id);
            $coupon->code         = $this->upd_code;
            $coupon->type         = $this->upd_type;
            $coupon->value        = $this->upd_value;
            $coupon->cart_value   = $this->upd_cart_value;
            $coupon->status       = $this->status;
            $pc = $coupon->save();
            
            if ($pc) {
                $this->dispatchBrowserEvent('CloseEditCouponModal');
            }
        }


}

