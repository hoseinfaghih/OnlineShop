<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function catedit (){
        $data = [
            'CategoryList' => Category::whereNull('parent_id')->get(),
            'CategoryList2' => Category::WhereNotNull('parent_id')->get()
        ];
        return view('admincat',$data);
    }
    function create(Request $request){
        $request->validate([
            'titlefa' => 'required|max:100',
            'titleeng' => 'required|max:100',
            'category' => 'required'
        ]);
        $cat = new Category; 
        $cat->name = $request->titlefa;
        $cat->name_en = $request->titleeng;
        $cat->parent_id = $request->category;
        $save = $cat->save();
        if ($save){
            return back()->with('success','دسته بندی شما با موفقیت ساخته شد');
        }
        else{
            return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
        }
    }
    function delete(Request $request){
        $request->validate([
            'title' => 'required'
        ]);
        $cat = Category::where('id','=',$request->title)->first();
        if ($cat != null) {
            $cat->delete();
            return back()->with('success','دسته بندی شما با موفقیت حذف شد');
        }
        return back()->with('fail','عملیات موفقیت آمیز نبود، لطفا دوباره تلاش کنید!');
    }
}
