<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $comment = [
            'post_id' =>$request->post_id,
            'author' => $user->name,
            'email' =>$user->email,
            'body' =>$request->body,
            'photo' => $user->photo->path
        ];
        Comment::create($comment);
        return redirect()->back();
    }
}
