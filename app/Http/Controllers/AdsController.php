<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;

class AdsController extends Controller
{
    function show ($id){
        // $data = [
        //     'AdInfo' => Ad::where('id','=',$id)->first()
        // ];
        $data = Ad::where('id','=',$id)->first();
        $ok = [
            'AdInfo' => Ad::where('id','=',$id)->first(),
            'UserInfo' => User::where('id','=',$data['user_id'])->first(),
            'CategoryList' => Category::whereNull('parent_id')->get(),
            'CommentsList' => Comment::where('adid','=',$id)->get()
        ];
        // dd($ok);
        return view('showad',$ok);
    }
}
