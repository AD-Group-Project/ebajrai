<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class Search extends Controller
{
    public function search(Request $request)
    {
        $search_text = $request->input('nameSearch');
        $products = Product::where('name','LIKE','%'.$search_text.'%')->get();
        $categories = Category::all();

        return view('edit.search', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
