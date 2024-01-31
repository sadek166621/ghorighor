<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        return  view('admin.author.author',[
            'authors'=>Author::all()
        ]);
    }
    public function saveAuthor(Request $request){
        $author = new Author();
        $author->author = $request->author;
        $author->save();
        return back();
    }
}
