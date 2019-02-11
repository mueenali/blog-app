<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;

class AdminRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;
        return view('admin.comments.replies.show',compact('replies'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $reply = Reply::findOrFail($id);
        $reply->is_active = $input['is_active'];
        $reply->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reply::where('id',$id)->delete();
        return redirect()->back();
    }
}
