<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout.checkout');
    }
    public function saveShipping(Request $request){
        return $request;
        $shipping = new Shipping();
        $shipping->first_name =$request->first_name;
        $shipping->last_name =$request->last_name;
        $shipping->address =$request->address;
        $shipping->city =$request->city;
        $shipping->zip =$request->zip;
        $shipping->email =$request->email;
        $shipping->phone =$request->phone;
        $shipping->save();
        $shippingId= $shipping->id;
        session::put('shippingId',$shippingId);

        $payment = new Payment();
        if($request->payment_method){
            $payment->payment_method = $request->payment_method;
            $payment->payment_mobile_no = $request->payment_mobile_no;
            $payment->transaction_no = $request->transaction_no;
            $payment->amount = $request->amount;
        }
        else{
            $payment->payment_method = 'cod';
        }
        $payment->save();
        $paymentId= $payment->id;
        session::put('paymentId',$paymentId);

        $order = new Order();
        $order->shipping_id=Session::get('shippingId');
        $order->payment_id=Session::get('paymentId');
        $order->order_no=rand(00000,99999);
        $order->order_total=$request->order_total;
        $order->subtk=$request->subtk;
        $order->status='0';
        $order->payment_status='0';
        $order->save();
        $orderId= $order->id;
        session::put('orderId',$orderId);

        $products = Cart::content();
        foreach ($products as $product){
            $orderDetail= new OrderDetail();
            $orderDetail->order_id = Session::get('orderId');
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $product->qty;
            $orderDetail->save();
        }
        Cart::destroy();
        Toastr::success('Your Order Is Taken Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('/')->with('message','Your Order Is Taken Successfully');
    }
}
