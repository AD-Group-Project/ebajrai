<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagessize;


    public function search(Request $request)
    {
        $request->validate([
            'query'=> 'required|min:3',
        ]);

        $query = $request->input('query');

        $product = Product::where('name', 'like', "%$query%")->get();

        return view ('search-result')->with('products', $products);
    }

    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to Cart');
        return redirect()->route('product.cart');
    }

}