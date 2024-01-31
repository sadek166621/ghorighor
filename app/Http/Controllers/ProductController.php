<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductSubImage;
use App\SubCategory;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('publication_status',1)->get();
        $subCategories = SubCategory::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        $supplier = Supplier::where('publication_status',1)->get();

        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands,
            'subCategories'=>$subCategories,
            'suppliers'=>$supplier

        ]);
    }

    private function savebasicproductInfo(Request $request){
//        return $request;
        $this->validate($request, [
            'category_id' => 'required|',
            'brand_id' => 'required|',
            'supplier_id' => 'required|',
            'product_name' => 'required|',
            'product_code' => 'required|unique:products|',
            'product_price' => 'required|',
            'discount_product_amount' => 'required|',
            'discount_product_price' => 'required|',
            'product_quantity' => 'required|',
            'product_cost' => 'required|',
            'product_stock' => 'required|',
            'product_color' => 'required|',
            'description' => 'required|',
        ]);
        $product = new Product();
        $product->category_id= $request->category_id;
        $product->sub_category_id= $request->sub_category_id;
        $product->brand_id= $request->brand_id;
        $product->supplier_id= $request->supplier_id;
        $product->product_name= $request->product_name;
        $product->slug=Str::of($request->product_name)->slug('-');
        $product->product_code= $request->product_code;
        $product->product_price= $request->product_price;
        $product->discount_product_amount= $request->discount_product_amount;
        $product->discount_product_price= $request->discount_product_price;
        $product->product_quantity= $request->product_quantity;
        $product->product_cost= $request->product_cost;
        $product->product_stock= $request->product_stock;
        $product->product_color= $request->product_color;
        $product->product_made_by= $request->product_made_by;
        $product->description= $request->description;
        $product->link= $request->link;
        $product->main_image= $this->saveMainProductInfo($request);
        $product->primium= $request->primium;
        $product->featured_product= $request->featured_product;
        $product->new_arrivals= $request->new_arrivals;
        $product->ramdom_products= $request->ramdom_products;
        $product->latest_product= $request->latest_product;
        $product->publication_status= $request->publication_status;
        $product->save();
        $productId = $product->id;
        return $productId;
    }


    private function saveMainProductInfo($request){
        $this->validate($request, [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $mainImage=$request->file('main_image');
        $mainImageName=$mainImage->getClientOriginalName();
        $uploadPath='image/product/main_image/';
        $mainImageUrl=$uploadPath.$mainImageName;
        $mainImage->move($uploadPath,$mainImageName);
        return $mainImageUrl;
    }

    private function uploadProductImage($request, $product_id) {
        if($files=$request->file('sub_image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $uploadPath='image/product/sub_image/';
                $imageUrl=$uploadPath.$name;
                $file->move($uploadPath,$name);
                $productSubImage = new ProductSubImage();
                $productSubImage->product_id = $product_id;
                $productSubImage->sub_image = $imageUrl;
                $productSubImage->save();
            }
        }
    }

    public function saveProduct(Request $request){
        $productId = $this->savebasicproductInfo($request);
        $this->uploadProductImage($request, $productId);
        return redirect('/add-product')->with('message','Product save Successfully');
    }

    public function manageProduct() {
        $allPublishedProducts = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            // ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('products.id', 'products.product_name','products.product_quantity','products.product_price', 'products.product_cost','products.product_stock', 'products.publication_status', 'categories.category_name')
             //->where('products.publication_status','=',1)
             ->orderBy('products.id', 'desc')
            ->get();
            // return $allPublishedProducts;
        return view('admin.product.manage-product', ['allPublishedProducts'=>$allPublishedProducts]);
    }

    public function viewProductInfo($id) {
        $categories=Category::where('publication_status',1)->get();
        $subCategories=SubCategory::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        $suppliers=Supplier::where('publication_status',1)->get();

        $productById = Product::find($id);

        $productSubImages = ProductSubImage::where('product_id', $id)->get();

        return view('admin.product.view-product', [
            'categories'=>$categories,
            'subCategories'=>$subCategories,
            'brands'=>$brands,
            'suppliers'=>$suppliers,
            'productById' => $productById,
            'productSubImages' => $productSubImages
        ]);
    }

    public function editProductInfo($id) {
        $categories=Category::where('publication_status',1)->get();
        $subCategories=SubCategory::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        $suppliers=Supplier::where('publication_status',1)->get();

        $productById = Product::find($id);

        $productSubImages = ProductSubImage::where('product_id', $id)->get();

        return view('admin.product.edit-product', [
            'categories'=>$categories,
            'subCategories'=>$subCategories,
            'brands'=>$brands,
            'suppliers'=>$suppliers,
            'productById' => $productById,
            'productSubImages' => $productSubImages
        ]);
    }
    private function updateProductBasicInfo($request) {
        $product = Product::find($request->product_id);
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->discount_product_amount=$request->discount_product_amount;
        $product->discount_product_price=$request->discount_product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_cost = $request->product_cost;
        $product->product_stock = $request->product_stock;
        $product->product_color = $request->product_color;
        $product->product_made_by  = $request->product_made_by;
        $product->description = $request->description;
        $product->link = $request->link;
        if($request->main_image) {
            unlink($product->main_image);
            $product->main_image = $this->saveMainProductInfo($request);
        }
        $product->primium= $request->primium;
        $product->featured_product= $request->featured_product;
        $product->new_arrivals= $request->new_arrivals;
        $product->ramdom_products= $request->ramdom_products;
        $product->latest_product= $request->latest_product;
        $product->publication_status=$request->publication_status;
        $product->save();
    }


    public function updateProductInfo(Request $request) {
        $this->updateProductBasicInfo($request);
        if($request->sub_image) {
            $productSubImages = ProductSubImage::where('product_id', $request->product_id)->get();
            foreach ($productSubImages as $productSubImage) {
                unlink($productSubImage->sub_image);
                $productSubImage->delete();
            }
            $this->uploadProductImage($request, $request->product_id);
        }
        return redirect('/manage-product')->with('message', 'Product info update successfully');
    }




    public function unpublishedProductInfo($id) {
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();

        return redirect('/manage-product')->with('message', 'Product info unpublished successfully');
    }

    public function publishedProductInfo($id) {
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();

        return redirect('/manage-product')->with('message', 'Product info published successfully');
    }
    public function deleteProductInfo($id) {
        $productById = Product::find($id);
        $productById->delete();
        unlink($productById->main_image  );
        $productSubImages = ProductSubImage::where('product_id', $id)->get();

        foreach ($productSubImages as $productSubImage){
            $productSubImage->delete();
            unlink($productSubImage->sub_image);
        }

        return redirect('/manage-product')->with('message', 'Product info delete successfully');
    }
//
//
    public function selectSubCategoryByCategoryId($id) {
        $subCategoriesByCategoryId= SubCategory::where('category_id', $id)->get();
        echo view('admin.product.sub-category-content', [
            'subCategoriesByCategoryId'=>$subCategoriesByCategoryId
        ]);
    }

}
