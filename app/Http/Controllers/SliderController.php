<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addSlider(){
        $sliders = Slider::orderby('id','desc')->get();
        return view('admin.slider.add-slider',[
            'sliders' =>$sliders,
        ]);
    }
    private function savebasicsliderInfo(Request $request){
        $this->validate($request, [
            'first_header' => 'required',
            'last_header' => 'required',
        ]);
        $slider = new Slider();
        $slider->first_header= $request->first_header;
        $slider->last_header= $request->last_header;
        $slider->image= $this->saveSliderImageInfo($request);
        $slider->publication_status= $request->publication_status;
        $slider->save();
    }
    private function saveSliderImageInfo($request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'image/slider_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }

    public function saveSlider(Request $request){
        $this->savebasicsliderInfo($request);
        return redirect('/add-slider')->with('message','Slider save Successfully');
    }
    public function viewSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.view-slider',[
            'slider' =>$slider
        ]);

    }
    public function editSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit-slider',[
            'slider' =>$slider
        ]);

    }
    private function updateSliderBasicInfo($request, $imageUrl=null){
        $slider= Slider::find($request->slider_id);
        $slider->first_header= $request->first_header;
        $slider->last_header= $request->last_header;
        if($imageUrl) {
            $slider->image = $imageUrl;
        }
        $slider->publication_status = $request->publication_status;
        $slider->save();
    }
    private function updateSliderImage($sliderimage) {
        $imageName = rand() . '.' . $sliderimage->getClientOriginalExtension();
        $directory = 'image/slider_image/';
        $imageUrl = $directory.$imageName;
        $sliderimage->move($directory, $imageName);
        return $imageUrl;
    }
    public  function  updateSlider(Request $request){
        $sliderimage = $request->file('image');
        if($sliderimage){
            $slider = Slider::find($request->slider_id);
            unlink($slider->image);
            $imageUrl = $this->updateSliderImage($sliderimage);
            $this->updateSliderBasicInfo($request,$imageUrl);
        }else{
            $this->updateSliderBasicInfo($request);
        }
        return redirect('/manage-slider')->with('message','Info update Successfully');
    }
    public function publishedSlider($id){
        $slider = Slider::find($id);
        $slider->publication_status= 0;
        $slider->save();
        return redirect('/add-slider')->with('message','Info unpublished Successfully');
    }
    public function unpublishedSlider($id){
        $slider = Slider::find($id);
        $slider->publication_status= 1;
        $slider->save();
        return redirect('/add-slider')->with('message','Info published Successfully');
    }
    public function deleteSlider($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('/add-slider')->with('message','Info delete Successfully');
    }
}
