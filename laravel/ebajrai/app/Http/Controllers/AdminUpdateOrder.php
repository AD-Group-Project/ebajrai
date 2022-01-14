<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use Carbon\Carbon;

class AdminUpdateOrder extends Controller
{
    function updateForm($id)
    {
        $order = DB::select('select * from orders where id = ?', [$id]);
        return view('edit.adminorderstatus', ['order'=>$order]);
    }

    function updateOrder(Request $request, $id)
    {
        $status = $request->input('status');

        if($status == "delivered")
        {
            $delivered_date = Carbon::now();
            $courier = $request->input('courier'); 
            $trackingno = $request->input('trackingno'); 
            DB::update('update orders set status=?,delivered_date=?,courier=?,trackingno=? where id=?', [$status,$delivered_date,$courier,$trackingno,$id]);
            return redirect()->back()->with('message', 'Order has been updated succesfully!');
        }
        else if($status == "canceled")
        {
            $canceled_date = Carbon::now();
            DB::update('update orders set status=?,canceled_date=? where id=?', [$status,$canceled_date,$id]);
            return redirect()->back()->with('message', 'Order has been updated succesfully!');
        }

        else if($status == "completed")
        {
            $pickup_date = Carbon::now();
            DB::update('update orders set status=?,pickup_date=? where id=?', [$status,$pickup_date,$id]);
            return redirect()->back()->with('message', 'Order has been updated succesfully!');
        }
    }
}
