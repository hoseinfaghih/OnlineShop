<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Symfony\Contracts\Service\Attribute\Required;

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
    function create (Request $request){
        $request->validate([
            'category' => 'required',
            'phonenumber' => 'required|size:11',
            'title' => 'required|min:5|max:70',
            'price' => 'required|numeric',
            'address' => 'required|max:255',
            'description' => 'required'
        ]);
        $ad = new Ad;
        $ad->title = $request->title;
        $ad->user_id = session('LoggedUser');
        $ad->description = $request->description;
        $ad->category_id = $request->category;
        $ad->price = $request->price;
        $ad->image_url = "hamini ke hast";
        $ad->phone_number = $request->phonenumber;
        $ad->address = $request->address;
        $save = $ad->save();
        if ($save){
            return back()->with('success','آگهی شما با موفقیت به سایت افزوده شد.');
        }
        else{
            return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
        }
    }
    function delete (Request $request){
        $request->validate([
            'title' => 'required'
        ]);
        $ad = Ad::where('id','=',$request->title)->first();
        if ($ad != null) {
            $ad->delete();
            return back()->with('success','آگهی شما با موفقیت حذف شد!');
        }
        return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
    }
    function update(Request $request){
        $request->validate([
            'titleprev' => 'required',
            'category' => 'required',
            'phonenumber' => 'required|size:11',
            'titlenew' => 'required|min:5|max:70',
            'price' => 'required|numeric',
            'address' => 'required|max:255',
            'description' => 'required'
        ]);
        $ad = Ad::where('id','=',$request->titleprev)->first();
        $ad->title = $request->titlenew;
        $ad->user_id = session('LoggedUser');
        $ad->description = $request->description;
        $ad->category_id = $request->category;
        $ad->price = $request->price;
        $ad->image_url = "hamini ke hast";
        $ad->phone_number = $request->phonenumber;
        $ad->address = $request->address;
        $save = $ad->save();
        if ($save){
            return back()->with('success','آگهی شما با موفقیت به روز شد.');
        }
        else{
            return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
        }
        
    }
}
