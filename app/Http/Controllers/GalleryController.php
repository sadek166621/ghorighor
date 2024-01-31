<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function addGallery(){
        $gallery = Gallery::all();
        return view('admin.gallery.add-gallery',[
            'gallery' =>$gallery
        ]);

    }
    private function savebasicsliderInfo(Request $request){
        $this->validate($request, [

        ]);
        $gallery = new Gallery();
        $gallery->image= $this->saveSliderImageInfo($request);
        $gallery->url= $request->url;
        $gallery->section= $request->section;
        $gallery->publication_status= $request->publication_status;
        $gallery->save();
    }
    private function saveSliderImageInfo($request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin/gallery_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    public function saveGallery(Request $request){
        $this->savebasicsliderInfo($request);
        return redirect('/add-gallery')->with('message','gallery save Successfully');
    }

    public function editGallery($id){
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit-gallery',[
            'gallery' =>$gallery
        ]);

    }
    private function updateGalleryBasicInfo($request, $imageUrl=null){
        $gallery= Gallery::find($request->gallery_id);
        if($imageUrl) {
            $gallery->image = $imageUrl;
        }
        $gallery->url= $request->url;
        $gallery->section= $request->section;
        $gallery->publication_status= $request->publication_status;
        $gallery->save();
    }
    private function updateGalleryImage($galleryImage) {
        $imageName = rand() . '.' . $galleryImage->getClientOriginalExtension();
        $directory = 'admin/gallery_image/';
        $imageUrl = $directory.$imageName;
        $galleryImage->move($directory, $imageName);
        return $imageUrl;
    }
    public  function  updateGallery(Request $request){
        $galleryImage = $request->file('image');
        if($galleryImage){
            $gallery = Gallery::find($request->gallery_id);
            unlink($gallery->image);
            $imageUrl = $this->updateGalleryImage($galleryImage);
            $this->updateGalleryBasicInfo($request,$imageUrl);
        }else{
            $this->updateGalleryBasicInfo($request);
        }
        return redirect('/add-gallery')->with('message','Info update Successfully');
    }

    public function publishedGallery($id){
        $gallery = Gallery::find($id);
        $gallery->publication_status= 0;
        $gallery->save();
        return redirect('/add-gallery')->with('message','Info unpublished Successfully');
    }
    public function unpublishedGallery($id){
        $gallery = Gallery::find($id);
        $gallery->publication_status= 1;
        $gallery->save();
        return redirect('/add-gallery')->with('message','Info published Successfully');
    }
    public function deleteGallery($id){
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/add-gallery')->with('message','Info delete Successfully');
    }
}
