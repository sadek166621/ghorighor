<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category',[
            'categories'=> Category::orderby('id', 'desc')->get(),
        ]);
    }

    private function savebasiccategoryInfo(Request $request){
        $this->validate($request, [
            'category_name' => 'required|string|min:1',
        ]);
        $category = new Category();
        $category->category_name= $request->category_name;
        $category->image= $this->saveSliderImageInfo($request);
        $category->publication_status= $request->publication_status;
        $category->save();
        return back();
    }
    private function saveSliderImageInfo($request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'image/category_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    public function saveCategory(Request $request){
        $this->savebasiccategoryInfo($request);
        return redirect('/add-category')->with('message','Category save Successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',[
            'categories' =>$categories
        ]);
    }
//
    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status= 0;
        $category->save();
        return redirect('/add-category')->with('message','category published Successfully');
    }
    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status= 1;
        $category->save();
        return redirect('/add-category')->with('message','category unpublished Successfully');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/add-category')->with('message','category delete Successfully');
    }
      public function editCategory($id){
        $categoryById=Category::find($id);
        return view('admin.category.edit-category',[
            'category'=>$categoryById,
        ]);
    }
    public function updateCategory(Request $request) {
        $category=Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->publication_status= $request->publication_status;
        if($request->image) {
            unlink($category->image);
            $category->image = $this->saveSliderImageInfo($request);
        }
        $category->save();
        return redirect('/add-category')->with('message','Category Info Update Successfully');
    }
}
