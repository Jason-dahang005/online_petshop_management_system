<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
	use WithPagination;
	use WithFileUploads;
	public $name, $upd_name;
	public $slug, $upd_slug;
	public $product_category_id, $upd_product_category_id;
	public $description, $upd_description;
	public $stock, $upd_stock;
	public $image, $upd_image, $old_image;
	public $price, $upd_price;
	public $upd_id;
	public $perPage = 6;
	public $search = '';

// for rendering the livewire component
	public function render()
	{
		return view('livewire.admin.product-component', [
			'prod_cat' => ProductCategory::all(),
			'prod' => Product::search($this->search)->orderBy('created_at', 'desc')->simplePaginate($this->perPage)
		])->layout('layouts.admin', ['title'=>'Product List']);
	}

// open create modal
	public function OpenAddProductModal(){
		$image = "";
		$this->dispatchBrowserEvent('OpenAddProductModal');
	}

// open update modal
	public function OpenEditProductModal($id){
		$upd_prod               = product::find($id);
		$this->upd_name             	= $upd_prod->name;
        $this->upd_slug             	= $upd_prod->slug;
		$this->upd_description      	= $upd_prod->description;
		$this->upd_product_category_id	= $upd_prod->product_category_id;
        $this->upd_price            	= $upd_prod->price;
		$this->status               	= $upd_prod->status;
		$this->upd_stock 	            = $upd_prod->stock;
		$this->upd_id               	= $upd_prod->id;   
		$this->old_image                = $upd_prod->image;

		$this->dispatchBrowserEvent('OpenEditProductModal',[
			'id' => $id
		]);
	}

// update product
	public function updateProduct(){
		$upd_id = $this->upd_id;
		$this->validate([
			'upd_name'          => 'required|unique:products,name,'.$upd_id,
            'upd_description'   => 'required',
            'upd_price'         => 'required',

		],[
			'upd_name.unique'=>'Name already exist'
		]);

		$prod = product::find($upd_id);
		$prod->name         			= $this->upd_name;
        $prod->slug         			= $this->upd_slug;
		$prod->description  			= $this->upd_description;
		$prod->status       			= $this->status;
		$prod->stock      				= $this->upd_stock;
		$prod->product_category_id      = $this->upd_product_category_id;
        $prod->price        			= $this->upd_price;
		if($this->upd_image){
            $imageName = Carbon::now()->timestamp. '.'. $this->upd_image->extension();
            $this->upd_image->storeAs('images', $imageName);
            $prod->image = $imageName;
        }
		$pc = $prod->save();

		if ($pc) {
			$this->dispatchBrowserEvent('CloseEditProductModal');
			
		}
	}

// generates a slug for the create modal
	public function generateSlug(){
		$this->slug = Str::slug($this->name);
	}
// generates a slug for the update modal
	public function generateEditSlug(){
			$this->upd_slug = Str::slug($this->upd_name);
	}

// add product
	public function addProduct(){
		$this->validate([
			'name' => 'required|unique:products',
			'slug' => 'required',
			'description' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
			'product_category_id' => 'required',
		]);

		$prod = new Product();
		$prod->name = $this->name;
		$prod->slug = $this->slug;
		$prod->description = $this->description;
		$prod->stock = $this->stock;
		$prod->price = $this->price;
		$prod->product_category_id = $this->product_category_id;
		$imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
		$this->image->storeAs('images', $imageName);
		$prod->image = $imageName;
		$p = $prod->save();

		if ($p) {
			$this->dispatchBrowserEvent('CloseAddProductModal');
			
		}
	}

// open view modal
	public function OpenViewProductModal($id){
		$upd_prod               = product::find($id);
		$this->upd_name             	= $upd_prod->name;
        $this->upd_slug             	= $upd_prod->slug;
		$this->upd_description      	= $upd_prod->description;
		$this->upd_product_category_id	= $upd_prod->product_category_id;
        $this->upd_price            	= $upd_prod->price;
		$this->status               	= $upd_prod->status;
		$this->upd_stock 	            = $upd_prod->stock;
		$this->upd_id               	= $upd_prod->id;   
		$this->old_image                = $upd_prod->image;

		$this->dispatchBrowserEvent('OpenViewProductModal',[
			'id' => $id
		]);
	}
}
