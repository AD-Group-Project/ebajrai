<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LandingComponent extends Component
{
    public function render()
    {
        return view('livewire.landing-component')->layout('layouts.base');
    }
}
