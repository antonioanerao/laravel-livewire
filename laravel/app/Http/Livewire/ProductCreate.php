<?php

namespace App\Http\Livewire;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\UserRequest;
use Livewire\Component;
use \App\Models\Product;

class ProductCreate extends Component
{
    public Product $product;

    /**
     * Retorna as regras de validação do ProductCreateRequest
     * @return array
     */
    protected function rules(): array
    {
        return (new ProductCreateRequest())->rules();
    }

    public function mount()
    {
        $this->product = new Product();
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
