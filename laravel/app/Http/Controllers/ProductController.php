<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    private Product $product;

    public function __construct(Product $product) {
        $this->middleware('auth');
        $this->product = $product;
    }

    public function create() {
        return view('product.create');
    }
}
