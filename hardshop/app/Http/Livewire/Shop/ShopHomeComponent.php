<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class ShopHomeComponent extends Component
{
    public $products;

    public function mount(){
        $this->products = Product::all()->shuffle();
    }
    public function render()
    {
        return view('livewire.shop.shop-home-component') 
        ->layout('shop.layout.app')
        ->slot('main');
    }
}
