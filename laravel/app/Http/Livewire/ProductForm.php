<?php

namespace App\Http\Livewire;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use \App\Models\Product;

class ProductForm extends Component
{
    public Product $product;
    public Collection $categories;

    /**
     * Retorna as regras de validação do ProductCreateRequest
     * @return array
     */
    protected function rules(): array
    {
        return (new ProductCreateRequest())->rules();
    }

    public function mount(Product $product)
    {
        $this->categories = Category::all();
        $this->product = $product;
    }

    public function store()
    {
        $this->validate();
        $this->product->save();
        return redirect(route('home'))->with('success', 'success');
    }

    /**
     * Método para aplicar validação em tempo real com wire:keydown
     *
     * @return void
     */
    public function checkFields(): void
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.product-create');
    }
}
