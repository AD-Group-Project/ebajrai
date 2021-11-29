<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $categories = Category::all();
        return view('livewire.details-component',['product'=>$product], ['categories'=>$categories])->layout('layouts.base');
    }
}
