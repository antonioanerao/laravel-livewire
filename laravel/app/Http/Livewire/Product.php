<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public string $searchQuery = '';
    public int $currentPage;

    public function render()
    {
        $this->searchQuery == '' ? $this->currentPage = 0 : $this->currentPage = 1;

        $products = \App\Models\Product::when($this->searchQuery != '', function($query) {
            $query->where('name', 'like', '%'.$this->searchQuery.'%');
        })
        ->paginate(10, ['*'], 'page', $this->currentPage);

        return view('livewire.product', compact('products'));
    }
}
