<?php

namespace App\Http\Controllers;

use App\marquee;
use Illuminate\Http\Request;

class MarqueeController extends Controller
{
    public function marquee(){
        return view('admin.marque.marque',[
            'marquee'=>marquee::orderby('id','desc')->get(),
        ]);
    }
    public function newmarquee(Request $request){
        $this->validate($request, [
            'category_name' => 'required|min:5',
        ]);
        $category = new marquee();
        $category->category_name= $request->category_name;
        $category->publication_status= $request->publication_status;
        $category->save();
    }
    public function publishedmarquee($id){
        $category = marquee::find($id);
        $category->publication_status= 0;
        $category->save();
        return back();
    }
    public function unpublishedmarquee($id){
        $category = marquee::find($id);
        $category->publication_status= 1;
        $category->save();
        return back();
    }
    public function editmarquee($id){
        $categoryById=marquee::find($id);
        return view('admin.marque.edit-marque',[
            'category'=>$categoryById,
        ]);
    }
    public function deletemarquee($id){
        $category = marquee::find($id);
        $category->delete();
        return back();
    }
    public function updatemarquee(Request $request){
        $category=marquee::find($request->id);
        $category->category_name = $request->category_name;
        $category->publication_status= $request->publication_status;
        $category->save();
        return redirect('/marquee')->with('message','Marquee Info Update Successfully');
    }

}
