<?php

namespace App\Http\Livewire;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use \App\Models\Product;

class ProductForm extends Component
{
    public Product $product;
    public $productCategories;
    public Collection $categories;
    public $rules;
    public $messages;

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
        $this->product->save();
        $this->product->category()->sync($this->productCategories);
        return redirect(route('home'))->with('success', 'success');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
