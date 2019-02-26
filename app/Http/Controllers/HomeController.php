<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     *
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $categories = Category::all();
        return view('appFront.home',compact('posts','categories'));
    }
    public function category($slug){
        $category = Category::where('slug',$slug)->firstOrFail();
        $categories = Category::all();
        $posts = Post::where('category_id',$category->id)->paginate(10);
        return view('appFront.home',compact('posts','categories'));
    }
    public function search(Request $request){
        $keyword = $request->search;
        $request->session()->save($keyword);
        $posts = Post::query()->where('title','LIKE','%'.$keyword.'%')->paginate();
        $categories = Category::all();
        return view('appFront.home',compact('posts','categories'));
    }
}
