<?php

namespace App\Http\Controllers;

use App\Logo;
use App\message;
use Illuminate\Http\Request;
use DB;

class LogoController extends Controller
{
    public function addLogo(){

        return view('admin.logo.add-logo',[
            'logoss'=>Logo::orderby('id','desc')->get(),
        ]);
    }

    private function saveBasicLogoInfo(Request $request){
        $this->validate($request, [

        ]);
        $logo = new Logo();
        $logo->image= $this->saveLogoImageInfo($request);
        $logo->publication_status= $request->publication_status;
        $logo->save();
    }
    private function saveLogoImageInfo($request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:20480'
        ]);
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'image/logo_image/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }

    public function saveLogo(Request $request){
        $this->saveBasicLogoInfo($request);
        return redirect('/add-logo')->with('message','Logo save Successfully');
    }


    public function viewLogo($id){
        $logo = Logo::find($id);
        return view('admin.logo.view-logo',[
            'logo'=>$logo
        ]);

    }
    public function editLogo($id){
        $logo = Logo::find($id);
        return view('admin.logo.edit-logo',[
            'logo' =>$logo
        ]);

    }
    private function updateLogoBasicInfo($request, $imageUrl=null){
        $logo= Logo::find($request->logo_id);
        if($imageUrl) {
            $logo->image = $imageUrl;
        }
        $logo->publication_status = $request->publication_status;
        $logo->save();
    }
    private function updateLogoImage($logoImage) {
        $imageName = rand() . '.' . $logoImage->getClientOriginalExtension();
        $directory = 'image/logo_image/';
        $imageUrl = $directory.$imageName;
        $logoImage->move($directory, $imageName);
        return $imageUrl;
    }
    public  function  updateLogo(Request $request){
        $logoImage = $request->file('image');
        if($logoImage){
            $logo = Logo::find($request->logo_id);
            unlink($logo->image);
            $imageUrl = $this->updateLogoImage($logoImage);
            $this->updateLogoBasicInfo($request,$imageUrl);
        }else{
            $this->updateLogoBasicInfo($request);
        }
        return redirect('/add-logo')->with('message','Info update Successfully');
    }
    public function publishedLogo($id){
        $logo = Logo::find($id);
        $logo->publication_status= 1;
        $logo->save();
        return redirect('/add-logo')->with('message','Info unpublished Successfully');
    }
    public function unpublishedLogo($id){
        $logo = Logo::find($id);
        $logo->publication_status= 0;
        $logo->save();
        return redirect('/add-logo')->with('message','Info published Successfully');
    }
    public function deleteLogo($id){
        $logo = Logo::find($id);
        $logo->delete();
        return redirect('/add-logo')->with('message','Info delete Successfully');
    }
}
