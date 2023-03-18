<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class BitcoinPrice extends Component
{
    public $price;

    public function render()
    {
        return view('livewire.bitcoin-price');
    }

    public function getPrice() {
        return $this->price = Http::get('https://api.coindesk.com/v1/bpi/currentprice.json')['bpi']['USD']['rate_float'];
    }
}
