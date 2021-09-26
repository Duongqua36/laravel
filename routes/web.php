<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::get('/',[ProductController::class,'showHome'])->name('home');
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('submitLogin');

Route::get('/home',function (){
    return view('layout.index');
})->name('layout.dashboard');
Route::get('/list',[ProductController::class,'index'])->name('product.list');
Route::get('/add',[ProductController::class,'create'])->name('product.create');
Route::post('/add',[ProductController::class,'store'])->name('product.store');
Route::get('{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/search',[ProductController::class,'search'])->name('product.search');
Route::delete('/deleteAll',[ProductController::class,'deleteAll'])->name('product.deleteAll');
Route::get('/searchAll',[ProductController::class,'filter'])->name('product.filter');
Route::get('/searchProduct',[ProductController::class,'searchProduct'])->name('product.search2');
Route::get('{id}/detail',[ProductController::class,'productDetail'])->name('product.detail');

// category
Route::get('/category',[CategoryController::class,'showCategory'])->name('category.list');
Route::get('/addCategory',[CategoryController::class,'addCategory'])->name('category.add');
Route::post('/addCategory',[CategoryController::class,'store'])->name('category.store');
Route::get('{id}/deleteCate',[CategoryController::class,'destroyCate'])->name('category.destroy');
Route::get('{id}/editCate',[CategoryController::class,'editCate'])->name('category.edit');
Route::post('/update-list',[CategoryController::class,'saveList'])->name('category.saveList');







//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/home', function () {
//        return view('layout.index');
//    })->name('layout.index');
//
//
//});
