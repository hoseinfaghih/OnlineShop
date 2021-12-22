<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\UserController;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

// Route::get('/user/login',[UserController::class,'login'])->name('user.login');
// Route::get('/user/register',[UserController::class,'register'])->name('user.register');
// Route::post('/user/save',[UserController::class,'save'])->name('user.save');
// Route::post('/user/check',[UserController::class,'check'])->name('user.check');
// Route::get('/user/logout',[UserController::class,'logout'])->name('user.logout');

Route::prefix('/user')->group(function () {
    Route::get('/login',[UserController::class,'login'])->name('user.login');
    Route::get('/register',[UserController::class,'register'])->name('user.register');
    Route::post('/save',[UserController::class,'save'])->name('user.save');
    Route::post('/check',[UserController::class,'check'])->name('user.check');
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
});

Route::get('/ad/{id}',[AdsController::class,'show'])->name('ad.show');
Route::get('ad/{id}/addtofav',[FavController::class,'add'])->name('ad.addtofav');
// Route::get('/ad/{id}', function ($id) {
//     return $id;
// });
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('/showfavs',[FavController::class,'show'])->name('showfavorites');
Route::post('/ad/{id}/addcomment',[CommentController::class,'add'])->name('addcomment');