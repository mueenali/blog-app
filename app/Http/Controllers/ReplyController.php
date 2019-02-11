<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $user = Auth::user();
        $reply = [
            'comment_id' =>$request->comment_id,
            'author' => $user->name,
            'email' =>$user->email,
            'body' =>$request->body,
            'photo' => $user->photo->path
        ];
        Reply::create($reply);
        return redirect()->back();
    }

}
