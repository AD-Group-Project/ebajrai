<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Livewire\Component;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use DB;

class AdminEditShop extends Controller
{

    function editForm($id)
    {
        $shop = DB::select('select * from shop  where id = 1');
        return view('edit.editshop', ['shop'=>$shop]);
    }

    function editShop(Request $request, $id)
    {
        $desc = $request->input('desc');
        $monThu = $request->input('monThu');
        $friday = $request->input('friday');
        $saturday = $request->input('saturday');
        $location = $request->input('location');
        $phoneNum = $request->input('phoneNum');
        $fax = $request->input('fax');
        

        DB::update('update shop set desc=?,monThu=?,friday=?,saturday=?,location=?,phoneNum=?,fax=?', [$desc,$monThu,$friday,$saturday,$location,$phoneNum,$fax]);
        return redirect()->back()->with('message', 'Shop\'s About has been updated succesfully!');
    }
}
