<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
// use Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Toastr;
class CartController extends Controller
{
    public function cartAdd(Request $request){
//        return $request;
        $product = Product::find($request->Product_id);

//        return $product;

            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'price'=> $product->product_price,
                'qty' => 1,
                'weight'=>500,
                'options' => [
                    'code' => $product->product_code,
                    'color' => $product->product_color,
                    'image' => $product->main_image,
//                    'size_width' => $product->size
                ]
            ]);
            // Toastr::success('Cart Add Successfully', 'Add Cart', ["positionClass" => "toast-top-right"]);
            return response()->json(['status' => 'success']);
    

    }
    public  function cartupdate(Request $request){

        Cart::update(
            $request->rowId,$request->qty
    );
        return redirect('/show-cart');

    }
    public function showCart(){
//        $products = Cart::content();
//        return $products;
        return view('frontend.cart.show-cart');
    }
    public  function removeCart($id){
        Cart:: remove($id);
        return back();

    }
}
