<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use Cart;
use DB;

class Payment extends Controller
{
    public $orderID;

    public function paymentPage($id)
    {
        $orderID = $id;
        $delivery = Delivery::where('order_id', $id)->first();
        return view('edit.payment', ['delivery'=>$delivery, 'id'=>$id]);
    }

    public function changeStatus($id)
    {
        foreach(Cart::content() as $item)
        {
            $productID = $item->id;
            $quantity = $item->qty;
            DB::select('update products set quantity=quantity-? where id = ? and quantity>0', [$quantity,$productID]);
        }

        DB::table('orders')->where('id',$id)->update(['status' => 'ordered']);
        return redirect()->route('acceptOrder');
    }
}
