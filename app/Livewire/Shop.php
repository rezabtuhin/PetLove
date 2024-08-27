<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Item;
use Livewire\Component;

class Shop extends Component
{
    public string $byCategory = '';
    public string $byBrand = '';
    public function render()
    {
        $categories = Categories::all()->pluck('name', 'name');
        $brands = Brand::all()->pluck('name', 'name');
        $items = Item::when($this->byCategory, function ($query) {
            $query->where('category', $this->byCategory);
        })->when($this->byBrand, function ($query) {
                $query->where('brand', $this->byBrand);
            })
            ->get();
        return view('livewire.shop', compact('categories', 'brands', 'items'));
    }

    public function addToCart($id){
        $data = [
            'user_id' => \Auth::user()->id,
            'item_id' => $id,
            'amount' => 1
        ];
        Cart::updateOrCreate($data);
        $this->dispatch('updateCartCount');
        session()->flash('success', 'Product Added Successfully');
    }
}
