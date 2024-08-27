<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShoppingCart extends Component
{
    public Collection $items;
    public int $sub_total , $tax , $total;
    public function render()
    {
        $this->items = Cart::with('item')->where(['user_id' => \Auth::user()->id])->get();
        $this->total = 0; $this->sub_total = 0; $this->tax = 0;
        foreach ($this->items as $item){
            $this->sub_total += ($item->item->price * $item->amount);
        }
        $this->total = $this->sub_total - $this->tax;
        return view('livewire.shopping-cart');
    }

    public function incrementQty($id): void
    {
        $cart = Cart::whereId($id)->first();
        $cart->amount += 1;
        $cart->save();
    }

    public function decrementQty($id): void
    {
        $cart = Cart::whereId($id)->first();
        if ($cart->amount > 1){
            $cart->amount -= 1;
            $cart->save();
        }
        else{
            session()->flash('info', 'Cannot decrement amount less than 1');
        }
    }

    public function removeItem($id){
        $cart = Cart::whereId($id)->first();
        if ($cart){
            $cart->delete();
        }
        $this->dispatch('updateCartCount');
        session()->flash('success', 'Item removed');
    }
}
