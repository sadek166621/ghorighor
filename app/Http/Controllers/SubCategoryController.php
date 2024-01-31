<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-sub-category',[
            'categories'=>Category::where('publication_status',1)->get(),
//            'subCategories'=>SubCategory::where('publication_status',1)->get(),
            'subCategories' => DB::table('sub_categories')
                ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                ->select('sub_categories.*', 'categories.category_name')
                ->orderBy('sub_categories.id', 'desc')
                ->get(),
        ]);
    }
    private function savebasiccategoryInfo(Request $request){
        $this->validate($request, [
            'sub_category_name' => 'required|string|min:1',
        ]);
        $subCategory = new SubCategory();
        $subCategory->category_id= $request->category_id;
        $subCategory->sub_category_name= $request->sub_category_name;
        $subCategory->publication_status= $request->publication_status;
        $subCategory->save();
    }
    public function saveSubCategory(Request $request){
        $this->savebasiccategoryInfo($request);
        return redirect('/sub-category')->with('messageSubCategory','Sub Category save Successfully');
    }

    public function publishedSubCategory($id){
        $subCategories = SubCategory::find($id);
        $subCategories->publication_status= 0;
        $subCategories->save();
        return redirect('/sub-category')->with('message','sub category unpublished Successfully');
    }
    public function unpublishedSubCategory($id){
        $subCategories = SubCategory::find($id);
        $subCategories->publication_status= 1;
        $subCategories->save();
        return redirect('/sub-category')->with('message','sub category published Successfully');
    }
    public function deleteSubCategory($id){
        $subCategories = SubCategory::find($id);
        $subCategories->delete();
        return redirect('/sub-category')->with('message','sub category delete Successfully');
    }
        public function editSubCategory($id) {
        $categories= Category::where('publication_status','1')->get();
        $subCategoryById=SubCategory::find($id);
        return view('/admin.category.edit-sub-category', [

                'subCategory' => $subCategoryById,
                'categories'=>$categories
            ]);
    }
    public function updateSubCategory(Request$request)  {
        $subCategoryId=$request->sub_category_id;
        $subCategory=SubCategory::find($subCategoryId);
        $subCategory->category_id=$request->category_id;
        $subCategory->sub_category_name=$request->sub_category_name;
        $subCategory->publication_status=$request->publication_status;
        $subCategory->save();
        return redirect('/sub-category')->with('message','Sub Category Info Update Successfully');
    }
}
