<?php

namespace App\Http\Controllers;


use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use DateTime;
use Illuminate\Http\Request;
use Session;
use PDF;
use DB;

class OrderController extends Controller
{
    public function manageOrder() {
        $allOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->join('shippings', 'orders.shipping_id' ,'=',  'shippings.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.order_no','orders.payment_status','shippings.first_name', 'orders.created_at','payments.payment_method')
            ->orderBy('orders.id', 'desc')
            ->get();
        return view('admin.order.manage-order', ['allOrders'=>$allOrders]);
    }

    public function pendingOrder() {
        $allOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->join('shippings', 'orders.shipping_id' ,'=',  'shippings.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.order_no','orders.payment_status','shippings.first_name', 'orders.created_at','payments.payment_method')
            ->where('orders.status',0)
            ->orderBy('orders.id', 'desc')
            ->get();
        return view('admin.order.pending-order', ['allOrders'=>$allOrders]);
    }

    public function successOrder() {
        $allOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->join('shippings', 'orders.shipping_id' ,'=',  'shippings.id')
            ->select('orders.id', 'orders.order_total','orders.order_no','orders.status','orders.payment_status','shippings.first_name','orders.created_at','payments.payment_method')
            ->where('orders.status',2)
            ->orderBy('orders.id', 'desc')
            ->get();
        return view('admin.order.success-order', ['allOrders'=>$allOrders]);
    }
    public function cancelOrder() {
        $allOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->join('shippings', 'orders.shipping_id' ,'=',  'shippings.id')
            ->select('orders.id', 'orders.order_total','orders.order_no','orders.status','orders.payment_status','shippings.first_name', 'orders.created_at','payments.payment_method')
            ->where('orders.status',1)
            ->orderBy('orders.id', 'desc')
            ->get();
        return view('admin.order.success-order', ['allOrders'=>$allOrders]);
    }


    public function viewOrderDetails($id) {
        $orderInfo = Order::find($id);
        $orderPaymentInfo = Payment::find($orderInfo->payment_id);
        $orderShippingInfo = Shipping::find($orderInfo->shipping_id);
        $orderProductsInfo = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.*', 'order_details.order_id','order_details.product_id','order_details.quantity')
            ->where('order_id', $id)
            ->get();

        return view('admin.order.view-order', [
            'orderInfo'=>$orderInfo,
            'orderProductsInfo' =>$orderProductsInfo,
            'orderShippingInfo' => $orderShippingInfo,
            'orderPaymentInfo' => $orderPaymentInfo
        ]);
    }
    public function viewOrderInvoice($id) {
        $orderInfo = Order::find($id);
        $orderPaymentInfo = Payment::find($orderInfo->payment_id);
        $shippingInfo = Shipping::find($orderInfo->shipping_id);
        $orderProductsInfo = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.*', 'order_details.order_id','order_details.product_id','order_details.quantity')
            ->where('order_id', $id)
            ->get();
            // return $orderInfo;

        $pdf = PDF::loadView('admin.order.view-order-invoice', [
            'orderInfo'=>$orderInfo,
            'orderProductsInfo' =>$orderProductsInfo,
            'shippingInfo' => $shippingInfo,
            'orderPaymentInfo' => $orderPaymentInfo
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function editOrder($id) {
        $orderById = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.*')
            ->where('orders.id', $id)
            ->first();
        return view('admin.order.edit-order', ['orderById' => $orderById]);
    }
    public function updateOrder(Request $request) {
        $orderById = Order::find($request->order_id);
        $orderById->status = $request->status;
        $orderById->payment_status = $request->payment_status;
        $orderById->save();

        $orderDetails = OrderDetail::where('order_id', $request->order_id)->get();
        foreach ($orderDetails as $orderProduct) {
            $product_id = $orderProduct->product_id;
            $productById = Product::find($product_id);
            $productById->product_stock = $productById->product_stock - $orderProduct->quantity;
            $productById->save();
        }
        return redirect('/manage-order')->with('message', 'Order info update successfully');
    }
    public function adminViewOrderInvoice($id) {
//        return $id;
        $orderInfo = Order::find($id);
        $orderPaymentInfo = Payment::find($orderInfo->payment_id);
        $shippingInfo = Shipping::find($orderInfo->shipping_id);
        $orderProductsInfo = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.*', 'order_details.*')
            ->where('order_id', $id)
            ->get();

        $pdf = PDF::loadView('admin.order.view-order-invoice', [
            'orderInfo'=>$orderInfo,
            'orderProductsInfo' =>$orderProductsInfo,
            'shippingInfo' => $shippingInfo,
            'orderPaymentInfo' => $orderPaymentInfo,
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function sellsReport() {
        $allOrders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status','orders.order_no', 'orders.created_at','payments.payment_method')
            ->orderBy('orders.id', 'desc')
            ->where('orders.status',2 )
            ->where('orders.payment_status',1)
            ->get();
        return view('admin.sells.sells-report', ['allOrders'=>$allOrders]);
    }

    public function searchOrderDate(Request $request) {
        $orders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status','orders.order_no', 'orders.created_at','payments.payment_method')
            ->whereBetween('orders.created_at',[$request->start_date, $request->ending_date])
            ->where('orders.status',2 )
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.sells.search-order-date', ['allOrders'=>$orders]);

    }



    public function dailySellsReport() {
         $toda =date_format(date_create(date("Y-m-j")),"Y-m-d");
        $orders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at','orders.order_no', 'payments.payment_method')
            ->whereDate('orders.created_at',$toda)
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();
//        return $orders;

        return view('admin.sells.daily-sells-report', ['allOrders'=>$orders]);

    }

    public function weeklySellsReport() {
        $toda =date_format(date_create(date("Y-m-j")),"Y-m-d");
        $toda1 =date('Y-m-d', strtotime('-7 days'));

        $orders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at','orders.order_no', 'payments.payment_method')
            ->whereBetween('orders.created_at',[$toda1,$toda])
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.sells.weekly-sells-report', ['allOrders'=>$orders]);

    }

    public function monthlySellsReport() {
        $toda =date('Y-m-01', strtotime('-1 month'));
        $toda1 =date('Y-m-31', strtotime('-1 month'));
//        return $toda;

        $orders = DB::table('orders')
            ->join('payments', 'orders.payment_id' ,'=',  'payments.id')
            ->select('orders.id', 'orders.order_total','orders.status','orders.payment_status', 'orders.created_at','orders.order_no', 'payments.payment_method')
            ->whereBetween('orders.created_at',[$toda,$toda1])
            ->where('orders.status',2)
            ->where('orders.payment_status',1)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.sells.monthly-sells-report', ['allOrders'=>$orders]);

    }

}
