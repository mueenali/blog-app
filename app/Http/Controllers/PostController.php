<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;


class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $categories = Category::all();
        $comments = $post->comments;
        return view('post',compact('post','categories','comments'));

    }
}
