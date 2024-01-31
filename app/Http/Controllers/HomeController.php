<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Customer;
use App\Order;
use App\Product;
use App\SubCategory;
use App\Supplier;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $toda =date_format(date_create(date("Y-m-j")),"Y-m-d");
        $orders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at', 'payments.payment_method')
            ->whereDate('orders.created_at',$toda)
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();
        $todaw =date_format(date_create(date("Y-m-j")),"Y-m-d");
        $toda1 =date('Y-m-d', strtotime('-7 days'));

        $weeklyorders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at', 'payments.payment_method')
            ->whereBetween('orders.created_at',[$toda1,$todaw])
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();

        $todam =date('Y-m-01', strtotime('-1 month'));
        $toda2 =date('Y-m-31', strtotime('-1 month'));
//        return $toda;

        $monthlyOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at', 'payments.payment_method')
            ->whereBetween('orders.created_at',[$todam,$toda2])
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.home.home',[
            'category'=>Category::select('id')->get(),
            'subCategory'=>SubCategory::select('id')->get(),
            'product'=>Product::select('id')->get(),
            'order'=>Order::select('id')->get(),
            'pendingOrder'=>Order::where('status',0)->select('id')->get(),
            'successOrder'=>Order::where('status',2)->select('id')->get(),
            'cancelOrder'=>Order::where('status',1)->select('id')->get(),
            'customer'=>Customer::select('id')->get(),
            'supplier'=>Supplier::select('id')->get(),
            'brand'=>Brand::select('id')->get(),
            'allOrders'=>$orders,
            'weeklyorders'=>$weeklyorders,
            'monthlyOrders'=>$monthlyOrders,
        ]);
    }
}
