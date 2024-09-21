<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    public int $total = 0;
    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.cart-counter');
    }
    #[On('updateCartCount')]
    public function getCartItemCount(): void
    {
        $this->total = Cart::whereUserId(\Auth::user()->id)->where('is_paid', 0)->count();
    }
}
