<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Cart;

class AcceptOrderComponent extends Component
{
    public function render()
    {
        Cart::destroy();
        return view('livewire.accept-order-component')->layout("layouts.base");
    }
}
