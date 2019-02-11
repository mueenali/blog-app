<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index(){
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        return view('admin.index',compact('postsCount','commentsCount','categoriesCount','usersCount'));
    }
}
