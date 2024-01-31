<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Contact;
use App\Customer;
use App\Gallery;
use App\message;
use App\Product;
use App\ProductSubImage;
use App\Slider;
use App\WishList;
use Toastr;
use Illuminate\Http\Request;
use DB;
use Session;
class EcommeceController extends Controller
{
    public function index(){
        return view('frontend.home.home',[
            'featureds'=>Product::where('featured_product',1)->where('publication_status',1)->orderby('id','desc')->take(8)->paginate(9),
            'arrivals'=>Product::where('new_arrivals',1)->where('publication_status',1)->orderby('id','desc')->paginate(9),
            'ramdoms'=>Product::where('ramdom_products',1)->where('publication_status',1)->orderby('id','desc')->paginate(9),
            'latests'=>Product::where('latest_product',1)->where('publication_status',1)->orderby('id','desc')->paginate(9),
            'brands'=>Brand::orderby('id','desc')->get(),
            'sliders'=>Slider::orderby('id','desc')->take(1)->get(),
            'banner'=>Gallery::where('section',1)->orderby('id','desc')->take(1)->first(),
            'banner2'=>Gallery::where('section',2)->orderby('id','desc')->take(1)->first(),
        ]);
    }

    public function search(Request $request){
        $products = DB::table('products')
            ->select('products.id','products.slug','products.main_image','products.product_stock','products.product_name','products.discount_product_price','products.product_price','products.description')
            ->where('product_name','LIKE','%'.$request->search_content.'%')
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view('frontend.our-product.our-product',[
            'categorys'=>$products,
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),

        ]);
    }
    public function ourproduct($id){

        return view('frontend.our-product.our-product',[
            'categorys'=>Product::where('category_id',$id)->where('publication_status',1)->paginate(9),
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),

        ]);
    }
    public function allcategorys($id){
        return view('frontend.our-product.our-product',[
            'categorys'=>Product::orderby('id','desc')->where('publication_status',1)->paginate(9),
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),

        ]);
    }
    public function ourprimiumproduct(){
        return view('frontend.our-product.primium-product',[
            'primiums'=>Product::where('primium',1)->where('publication_status',1)->paginate(9),
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),
        ]);
    }
    public function ourlatestproduct(){
        return view('frontend.our-product.latest-product',[
            'latest'=>Product::where('latest_product',1)->where('publication_status',1)->orderby('id','desc')->paginate(9),
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),
        ]);
    }
    public function ourbrandproduct($id){
        return view('frontend.our-product.our-product',[
            'categorys'=>Product::where('brand_id',$id)->where('publication_status',1)->paginate(9),
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),

        ]);
    }
    public function productPage($id){
        $products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*')
            ->where('products.category_id',$id)
            ->paginate(9);
        return view('frontend.our-product.category-product',[
            'products'=>$products,
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),
        ]);
    }
    public function productBrand($id){
        $products = DB::table('products')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*')
            ->where('products.brand_id',$id)
            ->paginate(9);
        return view('frontend.our-product.category-product',[
            'products'=>$products,
            'all_categorys'=>Category::where('publication_status',1)->get(),
            'all_brands'=>Brand::where('publication_status',1)->get(),
        ]);

    }
    public function productdetails($id){
        $post = Product::where('id', '=', $id)->first();
        $categories=category::all();
        $related= Product::where('category_id', '=', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get();
        return view('frontend.product-details.product-details',[
            'details'=>Product::find($id),
            'product_images'=> ProductSubImage::where('product_id',$id)->orderby('id','desc')->take(2)->get(),
        ])
        ->withPost($post)
        ->withCategories($categories)
        ->withRelated($related);
    }
    public function contactus(){
        return view('frontend.contact.contact-us',[
        'contacts'=>Contact::orderby('id','desc')->get(),
        ]);
    }
    public function customerlogin(){
        return view('frontend.login.login');
    }
    public function saveCustomer(Request $request){
        $this->validate($request, [
            'mobile_number' => 'required|min:11|max:14',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_number = $request->mobile_number;
        $customer->password = bcrypt($request->password);
        $customer->save();
        Toastr::success('Register Successfully', 'Title', ["positionClass" => "toast-top-right"]);
        return back()->with('message','Register Successfully');
    }
    public function customerLoginCheck(Request $request){
//        return $request;
        $customerInfo = Customer::where('email', $request->username)
            ->orWhere('mobile_number', $request->username)
            ->first();
        if($customerInfo) {
            $existingPassword = $customerInfo->password;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('customerId', $customerInfo->id);
                Session::put('customerName', $customerInfo->name);

                Toastr::success('Login Successfully', 'Login', ["positionClass" => "toast-top-right"]);
                return redirect('/');
            } else {
                return back()->with('message', 'Please use valid password');
            }
        } else {
            return back()->with('message', 'Please use valid email address');
        }
    }
    public function customerLogout(){

        Session::forget('customerId');
        Session::forget('customerName');
        Toastr::success('Logout Successfully', 'Logout', ["positionClass" => "toast-top-right"]);
        return redirect('/');
    }
    public function wishlist(){
        $customerId=Session::get('customerId');
        $products=DB::table('wish_lists')
            ->join('products','wish_lists.product_id','products.id')
            ->select('wish_lists.customer_id','wish_lists.id','wish_lists.product_id','products.product_name','products.main_image','products.product_price','products.discount_product_price','products.product_stock')
            ->where('wish_lists.customer_id',$customerId)
            ->get();
        return view('frontend.customer.wish-list',[
            'products'=>$products
        ]);
    }
    public function newwishlist(Request $request){
        $customerId=Session::get('customerId');
        if ($customerId) {
            $checkCustomerId = WishList::where('product_id',$request->product_id)
                ->where('customer_id',$customerId)
                ->first();
            if ($checkCustomerId){
                Toastr::success('This product already add your wish list', 'Can not add into Wishlist', ["positionClass" => "toast-top-right"]);
                return back();
            }else{
                $wishlist=new WishList();
                $wishlist->customer_id=$customerId;
                $wishlist->product_id=$request->product_id;
                $wishlist->save();
                Toastr::success('Great !! This product successfully add to your wish list', 'Wishlist', ["positionClass" => "toast-top-right"]);
                return back()->with('message','Great !! This product successfully add to your wish list.');
            }
        }else{
            Toastr::warning('You need to login fisrt for add a product into wishlist', 'Log in first', ["positionClass" => "toast-top-right"]);
            return back()->with('message','You need to login first for add a product into wishlist ');
        }
    }
    public function removeWishList($id){
        $wishlist = WishList::find($id);
        $wishlist->delete();
        Toastr::success('Wish list Info Delete Successfully', 'Wishlist Remove', ["positionClass" => "toast-top-right"]);
        return redirect('/');

    }
    public function messagesend(Request $request){
        $message = new message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->phone=$request->phone;
        $message->subjext=$request->subjext;
        $message->message=$request->message;
        $message->save();
        Toastr::success('Message Send Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
