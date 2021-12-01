<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(16);
        $categories = Category::all();
        if(!Auth::user())
        {
            return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
        }
        if(Auth::user()->utype === 'ADM')
        {
            return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('livewire\admin\admin-dashboard-component');
        }
        return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
