<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    function add ($id,Request $request){
        $request->validate([
            'comment' => 'required|max:255'
        ]);
        $user = User::where('id','=',session('LoggedUser'))->first();
        $comment = new Comment;
        $comment->userid = session('LoggedUser');
        $comment->username = $user['name'];
        $comment->adid = $id;
        $comment->commenttext = $request->comment;
        $save = $comment->save();
        if ($save){
            return back()->with('success','نظر شما ثبت شد!');
        }
        else{
            return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
        }
    }
}
