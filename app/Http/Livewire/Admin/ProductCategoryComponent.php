<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductCategoryComponent extends Component
{
	use WithPagination;
	public $name;
    public $slug;
	public $description;
    public $upd_slug;
	public $upd_name;
	public $upd_description;
	public $upd_id;
	public $status;
	public $perPage = 9;
	public $search = '';

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function generateEditSlug(){
        $this->upd_slug = Str::slug($this->upd_name);
    }

    // STORE
	public function OpenProductCategoryModal(){
		$this->dispatchBrowserEvent('OpenProductCategoryModal');
	}

	public function store(){
		$this->validate([
			'name'          => 'required|unique:product_categories',
            'slug'          => 'required',
			'description'   => 'required'
		]);

		$prod_cat = new ProductCategory();
		$prod_cat->name         = $this->name;
        $prod_cat->slug         = $this->slug;
		$prod_cat->description  = $this->description;
		$pc = $prod_cat->save();

		if ($pc) {
			$this->dispatchBrowserEvent('CloseProductCategoryModal');
		}
	}

	// UPDATE

	public function OpenEditProductCategoryModal($id){
		$upc_prod_cat               = ProductCategory::find($id);
		$this->upd_name             = $upc_prod_cat->name;
        $this->upd_slug             = $upc_prod_cat->slug;
		$this->upd_description      = $upc_prod_cat->description;
		$this->status               = $upc_prod_cat->status;
		$this->upd_id               = $upc_prod_cat->id; 
		$this->dispatchBrowserEvent('OpenEditProductCategoryModal',[
			'id' => $id
		]);
	}

	public function update(){
		$upd_id = $this->upd_id;
		$this->validate([
			'upd_name'          => 'required|unique:product_categories,name,'.$upd_id,
			'upd_description'   => 'required',
            'upd_slug'          => 'required',
			'status'            => 'required'
		
		]);

		$prod_cat = ProductCategory::find($upd_id);
		$prod_cat->name         = $this->upd_name;
        $prod_cat->slug         = $this->upd_slug;
		$prod_cat->description  = $this->upd_description;
		$prod_cat->status       = $this->status;
		$pc = $prod_cat->save();

		if ($pc) {
			$this->dispatchBrowserEvent('CloseEditProductCategoryModal');
		}
	}

	public function render()
	{
		return view('livewire.admin.product-category-component', [
			'prod_cat' => ProductCategory::search($this->search)->orderBy('created_at', 'desc')->simplePaginate($this->perPage)
		])->layout('layouts.admin', ['title'=>'Product Category']);
	}

}
