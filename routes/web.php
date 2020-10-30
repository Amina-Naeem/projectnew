<?php

use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){return view('welcome');});
Auth::routes();
Route::get('locale/{locale}',function($locale)
{
    Session::put('locale',$locale);
    return redirect()->back();
});
Route::get('/home',[WishController::class,'index'])->name('wish.list');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addWishView',[WishController::class, 'create']);
Route::post('/create-post',[WishController::class,'store'])->name('wish.create');
Route::get('/wishes',[WishController::class,'index'])->name('wish.list');
Route::get('/wishes/{id}',[WishController::class,'show']);
Route::get('/delete-wish/{id}',[WishController::class,'destroy']);
Route::get('/update-wish/{id}',[WishController::class,'edit']);
Route::post('/update-wish-data',[WishController::class,'update'])->name('wish.update');
