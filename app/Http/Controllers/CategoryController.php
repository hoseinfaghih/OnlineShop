<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function show ($id){
        $data = [
            'AdsInfoOfCat' => Ad::where('category_id','=',$id)->paginate(8),
            'CategoryList' => Category::whereNull('parent_id')->get()
        ];

        return view ('showcategory' ,$data);
    }
}
