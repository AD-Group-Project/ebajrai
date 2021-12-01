<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminProductsComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-products-component')->layout('livewire\admin\admin-dashboard-component');
    }
}
