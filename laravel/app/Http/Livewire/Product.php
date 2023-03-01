<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.product')
            ->with('products', \App\Models\Product::paginate(10));
    }
}
