<?php

namespace App\Http\Controllers;

use App\Contact;
use App\message;
use App\Newsletter;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(){
        $contact = Contact::orderby('id','desc')->get();
        return view('admin.contact.add-contact',[
            'contacts' =>$contact,
        ]);
    }

    private function saveBasicContactInfo(Request $request){
        $this->validate($request, [
            'phone_1' => 'required|string|min:1',
            'address' => 'required|string|min:1',
        ]);
        $contact = new Contact();
        $contact->phone_1= $request->phone_1;
        $contact->phone_2= $request->phone_2;
        $contact->phone_3= $request->phone_3;
        $contact->phone_4= $request->phone_4;
        $contact->phone_5= $request->phone_5;
        $contact->email= $request->email;
        $contact->email_1= $request->email_1;
        $contact->facebook= $request->facebook;
        $contact->twitter= $request->twitter;
        $contact->instagram= $request->instagram;
        $contact->pinterest= $request->pinterest;
        $contact->linkedIn= $request->linkedIn;
        $contact->youTube= $request->youTube;
        $contact->address= $request->address;
        $contact->map= $request->map;
        $contact->publication_status= $request->publication_status;
        $contact->save();
    }

    public function saveContact(Request $request){
        $this->saveBasicContactInfo($request);
        return redirect('/add-contact')->with('message','Contact save Successfully');
    }


    public function viewContact($id){
        $contact = Contact::find($id);
        return view('admin.contact.view-contact',[
            'contact' =>$contact
        ]);

    }
    public function editContact($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit-contact',[
            'contact' =>$contact
        ]);

    }
    private function updateSliderBasicInfo($request, $imageUrl=null){
        $contact= Contact::find($request->contact_id);

        $contact->phone_1= $request->phone_1;
        $contact->phone_2= $request->phone_2;
        $contact->phone_3= $request->phone_3;
        $contact->phone_4= $request->phone_4;
        $contact->phone_5= $request->phone_5;
        $contact->email= $request->email;
        $contact->email_1= $request->email_1;
        $contact->facebook= $request->facebook;
        $contact->twitter= $request->twitter;
        $contact->instagram= $request->instagram;
        $contact->pinterest= $request->pinterest;
        $contact->linkedIn= $request->linkedIn;
        $contact->youTube= $request->youTube;
        $contact->address= $request->address;
        $contact->map= $request->map;
        $contact->publication_status= $request->publication_status;
        $contact->save();
    }

    public  function  updateContact(Request $request){
        $this->updateSliderBasicInfo($request);
        return redirect('/add-contact')->with('message','Info update Successfully');
    }

    public function publishedContact($id){
        $contact = Contact::find($id);
        $contact->publication_status= 1;
        $contact->save();
        return redirect('/add-contact')->with('message','Info published Successfully');
    }
    public function unpublishedContact($id){
        $contact = Contact::find($id);
        $contact->publication_status= 0;
        $contact->save();
        return redirect('/add-contact')->with('message','Info unpublished Successfully');
    }
    public function deleteContact($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/add-contact')->with('message','Info delete Successfully');
    }

    public function newsLetter(){
        return view('admin.news-letter.news-letter',[
            'newsLetters' =>Newsletter::all(),
        ]);
    }
    public function seemassage(){
        return view('admin.contact.view-message',[
            'messages'=>message::orderby('id','desc')->get(),
        ]);
    }

}
