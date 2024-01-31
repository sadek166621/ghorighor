<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderby('id','desc')->get();
        return view('admin.brand.add-brand',[
            'brands' =>$brands
        ]);

    }

    private function savebasicbrandInfo(Request $request){
        $this->validate($request, [
            'brand_name' => 'required|string|min:1',
        ]);
        $brand = new Brand();
        $brand->brand_name= $request->brand_name;
        $brand->image= $this->uploadBrandImageInfo($request);
        $brand->publication_status= $request->publication_status;
        $brand->save();
    }
    private function uploadBrandImageInfo($request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'image/brand_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    public function saveBrand(Request $request){
        $this->savebasicbrandInfo($request);
        return redirect('/add-brand')->with('message','Brand save Successfully');
    }
    public function editbrand($id){
        return view('admin.brand.edit-brand',[
            'category'=>Brand::find($id),
        ]);
    }
    public function updatebrand(Request $request){
        $category = Brand::find($request->id);
        $category->brand_name = $request->brand_name;
        $category->publication_status= $request->publication_status;
        if($request->image) {
            unlink($category->image);
            $category->image = $this->saveSliderImageInfo($request);
        }
        $category->save();
        return redirect('/add-brand')->with('message',' Info Update Successfully');
    }

    private function savebasiccategoryInfo(Request $request){
        $this->validate($request, [
            'brand_name' => 'required|string|min:1',
        ]);
        $category = new Brand();
        $category->brand_name= $request->brand_name;
        $category->image= $this->saveSliderImageInfo($request);
        $category->publication_status= $request->publication_status;
        $category->save();
    }
    private function saveSliderImageInfo($request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'image/brand_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    public function publishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status= 0;
        $brand->save();
        return redirect('/add-brand')->with('message','Brand published Successfully');
    }
    public function unpublishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status= 1;
        $brand->save();
        return redirect('/add-brand')->with('message','Brand unpublished Successfully');
    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/add-brand')->with('message','Brand delete Successfully');
    }
}
