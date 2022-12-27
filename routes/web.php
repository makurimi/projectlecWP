<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\itemcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pesancontroller;
use App\Http\Controllers\historycontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\categorycontroller;
use App\Models\category;

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

Route::get('/', [homecontroller::class, 'render'])->name('render');

Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [LoginController::class, 'register_action'])->name('register.action');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login_action'])->name('login.action');

Route::get('password', [LoginController::class, 'password'])->name('password');
Route::post('password', [LoginController::class, 'password_action'])->name('password.action');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [profilecontroller::class,'index'])->middleware('auth');
Route::get('/editprofile', [profilecontroller::class,'editprofile']);
Route::post('editprofile', [profilecontroller::class,'update']);

Route::get('/history', [historycontroller::class, 'index']);
Route::get('/history/{id}', [historycontroller::class,'detail']);


Route::get('/product', [productcontroller::class, 'index'])->name('product');
Route::get('/product/search', [productcontroller::class, 'search'])->name('search');
Route::get('barang/{id}',[pesancontroller::class,'index'])->name('index');
Route::post('barang/{id}', [pesancontroller::class, 'Pesan'])->name('Pesan')->middleware('auth');
Route::get('checkout', [pesancontroller::class,'checkout']);
Route::delete('check-out/{id}', [pesancontroller::class, 'delete']);
Route::get('konfirmasi-check-out', [pesancontroller::class,'konfirmasi']);

Route::get('/categories/{id}', [categorycontroller::class, 'show']);
Route::get('/product/search', [categorycontroller::class, 'mysearch'])->name('mysearch');


Route::middleware('level')->group(function() {
    Route::get('/item',[itemcontroller::class,'item'])->name('item');
    Route::get('/additem',[itemcontroller::class,'insertitem'])->name('insertitem');
    Route::post('/iteminserted',[itemcontroller::class,'iteminserted'])->name('iteminserted');
    Route::get('/viewitem/{id}',[itemcontroller::class,'openitem'])->name('openitem');
    Route::post('/updateitem/{id}',[itemcontroller::class,'updateitem'])->name('updateitem');
    Route::get('/deleteitem/{item:id}',[itemcontroller::class,'deleteitem'])->name('deleteitem');
});


