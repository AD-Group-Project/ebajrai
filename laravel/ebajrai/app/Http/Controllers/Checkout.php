<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use DB;
use Cart;

class Checkout extends Controller
{
    public function render()
    {
        if(!(Profile::where('user_id',Auth::user()->id)->first()))
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        // $profile = Profile::where('user_id',Auth::user()->id)->first();
        if(!($user->profile->phone))
        {
            return redirect('/user/profile')->with('message', 'Please update your profile detail first before proceeding to checkout');
        }
        else if(!($user->profile->address))
        {
            return redirect('/user/profile')->with('message', 'Please update your profile detail first before proceeding to checkout');
        }
        return view('edit.checkout',['user'=>$user]);
    }

    public function submitOrder(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $address = $request->input('address');
        $deliveryType = $request->input('del');
        $deliverycost = 7;

        $order = new Order();
        // $order->user_id = Auth::user()->id();
        $order->user_id = $user->id;
        $order->subtotal = Cart::subtotal();
        $order->discount = 0;
        $order->tax = 0;

        if($deliveryType == "pickup")
        {
            $order->total = Cart::subtotal();
        }
        else{
            $order->total = Cart::subtotal()+7;
            // Cart::add('1','delivery cost',1,$deliverycost);
        }

        if($address == "defaultAddress")
        {
            $order->name = $user->name;
            $order->mobile = $user->profile->phone;
            $order->email = $user->email;
            $order->address = $user->profile->address;
            $order->is_shipping_different = 'false';
        }else{
            $order->name = $request->input('name');
            $order->mobile = $request->input('mobile');
            $order->email = $request->input('email');
            $order->address = $request->input('addressnew');
            $order->is_shipping_different = 'true';
        }
        $order->status = 'pending';
        $order->save();

        if($deliveryType == "pickup")
        {
            $delivery = new Delivery();
            $delivery->user_id = $order->user_id;
            $delivery->order_id = $order->id;
            $delivery->deliveryType = "pickup";
            $delivery->totalWithPostage = Cart::subtotal();
            $delivery->save();
        }
        else{
            // Cart::add('1','delivery cost',1,$deliverycost);
            $delivery = new Delivery();
            $delivery->user_id = $order->user_id;
            $delivery->order_id = $order->id;
            $delivery->deliveryType = "delivery";
            $delivery->totalWithPostage = Cart::subtotal()+7;
            $delivery->save();
        }

        foreach(Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($address != "defaultAddress")
        {
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->user_id = $user->id;
            $shipping->name = $order->name;
            $shipping->mobile = $order->mobile;
            $shipping->email = $order->email;
            $shipping->address = $order->address;
        }
        return redirect()->route('payment',[$order->id]);
    }
}
