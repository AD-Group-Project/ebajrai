<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class HomeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(16);
        $categories = Category::all();
        return view('livewire.home-component', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
