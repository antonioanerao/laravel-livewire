<?php

namespace App\Http\Livewire;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use \App\Models\Product;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;
    public Product $product;
    public $productCategories;
    public $photo;
    public Collection $categories;
    public $rules;
    public $messages;
    public $isUploading = false;

    public function mount(Product $product)
    {
        $this->categories = Category::all();
        $this->product = $product;
        $this->productCategories = $this->product->category()->pluck('categories.id');
        $this->rules = (new ProductRequest())->rules();
        $this->messages = (new ProductRequest())->messages();
    }

    public function store()
    {
        $this->validate();
        if($this->photo) {
            $filename = $this->photo->store('products', 'public');
            $this->product->photo = $filename;
        }
        $this->product->save();
        $this->product->category()->sync($this->productCategories);
        //return redirect(route('home'))->with('success', 'success');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
