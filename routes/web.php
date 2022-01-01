<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\UserController;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'AdsInfo' => Ad::paginate(8),
        'CategoryList' => Category::whereNull('parent_id')->get()
    ];
    return view('welcome',$data);
})->name('home');


Route::prefix('/user')->group(function () {
    Route::get('/login',[UserController::class,'login'])->name('user.login')->middleware('authcheck');
    Route::get('/register',[UserController::class,'register'])->name('user.register')->middleware('authcheck');
    Route::post('/save',[UserController::class,'save'])->name('user.save');
    Route::post('/check',[UserController::class,'check'])->name('user.check');
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout')->middleware('authcheck');
});

Route::get('/ad/{id}',[AdsController::class,'show'])->name('ad.show');
Route::get('ad/{id}/addtofav',[FavController::class,'add'])->name('ad.addtofav')->middleware('favauthcheck');


Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('/showfavs',[FavController::class,'show'])->name('showfavorites')->middleware('authcheck');

Route::prefix('/ad')->group(function() {
    Route::post('/{id}/addcomment',[CommentController::class,'add'])->name('addcomment');
    Route::post('/create',[AdsController::class,'create'])->name('ad.create');
    Route::post('/delete',[AdsController::class,'delete'])->name('ad.delete');
    Route::post('/update',[AdsController::class,'update'])->name('ad.update');
});

Route::get('/dashboard', function (){
    $data = [
        'CategoryList'  => Category::whereNull('parent_id')->get(),
        'MyAdsList' => Ad::where('user_id','=' , session('LoggedUser'))->get()
    ];
    return view('dashboard',$data);
})->name('dashboard')->middleware('authcheck');

// Route::get('/admin',[admin\MainController::class,'main'])->name('admin');
// Route::get('/admin/ad',[admin\MainController::class,'adedit'])->name('admin.adedit');
// Route::post('/admin/ad/create',[admin\MainController::class,'create'])->name('admin.create');
// Route::post('/admin/ad/update',[admin\MainController::class,'update'])->name('admin.update');
// Route::post('/admin/ad/delete',[admin\MainController::class,'delete'])->name('admin.delete');

Route::prefix('/admin')->group(function(){
    Route::get('',[admin\MainController::class,'main'])->name('admin');
    Route::prefix('/ad')->group(function(){
        Route::get('',[admin\MainController::class,'adedit'])->name('admin.adedit');
        Route::post('/create',[admin\MainController::class,'create'])->name('admin.create');
        Route::post('/update',[admin\MainController::class,'update'])->name('admin.update');
        Route::post('/delete',[admin\MainController::class,'delete'])->name('admin.delete');
    });
});
Route::prefix('/admin/category')->group(function(){
    Route::get('',[admin\CategoryController::class,'catedit'])->name('admin.catedit');
    Route::post('/create',[admin\CategoryController::class,'create'])->name('admincat.create');
    Route::post('/delete',[admin\CategoryController::class,'delete'])->name('admincat.delete');
});
// Route::get('/admin/category',[admin\CategoryController::class,'catedit'])->name('admin.catedit');
// Route::post('/admin/category/create',[admin\CategoryController::class,'create'])->name('admincat.create');
// Route::post('/admin/delete/delete',[admin\CategoryController::class,'delete'])->name('admincat.delete');