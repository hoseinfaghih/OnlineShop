<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class UserController extends Controller
{
    function login (){
        $data = [
            'CategoryList' => Category::whereNull('parent_id')->get()
        ];
        return view('login' , $data);
    }
    function register (){
        $data = [
            'CategoryList' => Category::whereNull('parent_id')->get()
        ];
        return view('register' , $data);
    }
    function save (Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:13'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request -> password);
        $save = $user->save();
        if ($save){
            return back()->with('success','اکانت شما با موفقیت ایجاد شد!');
        }
        else{
            return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
        }
    }
    function check (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5:max:13'
        ]);
        $userinfo = User::where('email','=',$request->email)->first();
        if(!$userinfo){
            return back()->with('fail','کاربری با همچین ایمیلی وجود ندارد!');
        }else{
            if(Hash::check($request->password,$userinfo->password)){
                $request->session()->put('LoggedUser',$userinfo->id);
                return redirect('/');
            }else{
                return back()->with('fail','رمزورود اشتباه است');
            }
        }
    }
    function logout (){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
