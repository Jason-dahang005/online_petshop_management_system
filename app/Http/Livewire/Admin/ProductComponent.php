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
	public $name;
	public $product_category_id;
	public $description;
	public $stock;
	public $image;
	public $price;
	public $perPage = 6;
	public $search = '';

	public function render()
	{
		return view('livewire.admin.product-component', [
			'prod_cat' => ProductCategory::all(),
			'prod' => Product::search($this->search)->orderBy('created_at', 'desc')->simplePaginate($this->perPage)
		])->layout('layouts.admin', ['title'=>'Products']);
	}

	public function OpenAddProductModal(){
		$this->dispatchBrowserEvent('OpenAddProductModal');
	}

	public function addProduct(){
		$this->validate([
			'name' => 'required|unique:products',
			'description' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
			'product_category_id' => 'required',
		]);

		$prod = new Product();
		$prod->name = $this->name;
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
}
