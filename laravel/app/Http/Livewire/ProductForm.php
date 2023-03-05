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
    public Collection $categories;
    public $rules;
    public $messages;

    public function mount(Product $product)
    {
        $this->categories = Category::all();
        $this->product = $product;
        $this->rules = (new ProductRequest())->rules();
        $this->messages = (new ProductRequest())->messages();
    }

    public function store()
    {
        $this->validate();
        $this->product->save();
        return redirect(route('home'))->with('success', 'success');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
