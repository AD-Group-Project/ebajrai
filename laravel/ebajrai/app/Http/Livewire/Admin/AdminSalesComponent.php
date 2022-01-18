<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Order;

class AdminSalesComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $totalSales = Order::where('status', 'delivered')->count() + Order::where('status', 'completed')->count();
        $totalRevenue = Order::where('status', 'delivered')->sum('total') + Order::where('status', 'completed')->sum('total');
        $todaySales = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->count() + Order::where('status', 'completed')->whereDate('created_at', Carbon::today())->count();
        $todayRevenue = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->sum('total') + Order::where('status', 'completed')->whereDate('created_at', Carbon::today())->sum('total');
        return view('livewire.admin.admin-sales-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales'=>$todaySales,
            'todayRevenue'=>$todayRevenue,
        ])->layout('livewire\admin\admin-dashboard-component');
    }
}
