<?php

use App\Http\Controllers\post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('post',[PostController::class,'store'])->name('post.store');
Route::get('post',[PostController::class,'index'])->name('post.index');
Route::get('post/show/{post}',[PostController::class,'show'])->name('post.show');
Route::get('post/edit/{post}',[PostController::class,'edit'])->name('post.edit');
Route::put('post/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('post/delete/{post}',[PostController::class,'delete'])->name('post.delete');