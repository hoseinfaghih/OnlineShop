<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class FavController extends Controller
{
    function add ($id){
        $favinfo = Favorite::where('userid' , '=', session('LoggedUser'))->where('adid' ,'=' , $id)->first();
        if ($favinfo){
            return back()->with('fail','قبلا افزوده اید!');
        }
        else{
            $fav = new Favorite;
            $fav->userid = session('LoggedUser');
            $fav->adid = $id;
            $save = $fav->save();
            if ($save){
                return back()->with('success','با موفقیت افزوده شد');
            }
            else{
                return back()->with('fail','عملیات با خطا روبه رو شد لطفا بعدا تلاش کنید');
            }
        }
    }
    function show (){
        $favinfo = Favorite::select('adid')->where('userid','=' , session('LoggedUser'))->get();
        $favarray = [];
        for ($i = 0 ;$i < sizeof($favinfo);$i++){
            array_push($favarray,$favinfo[$i]['adid']);
        }
        $favresult = Ad::whereIn('id',$favarray)->paginate(8);
        $data = [
            'FavInfo' => $favresult,
            'CategoryList' => Category::whereNull('parent_id')->get()
        ];
        return view('showfavorites' , $data);
    }
}
