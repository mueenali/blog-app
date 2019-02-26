<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Category;
use App\Post;


class AuthorPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_author');
    }

    public function create(){
       $categoriesCollection = Category::pluck('name', 'id')->all();
       $categories = Category::all();
       return view('author.post',compact('categories','categoriesCollection'));
   }
   public function store(PostRequest $request){
       Post::newPost($request);
       return redirect('/');
   }
}
