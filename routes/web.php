<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;

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
// Route::get('/', function () {
//     return view('index');
// })->name('home');
Route::get('/',[PostController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('tag', TagController::class,
        ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource('category', CategoryController::class,
        ['only' => ['index', 'store', 'update', 'destroy']]);
});

Route::resource('post', PostController::class);

Route::get('search/tag/{tag}', [SearchController::class, 'searchByTags'])
    ->name('searchByTags');
Route::get('search/keyword', [SearchController::class, 'searchByKeywords'])
    ->name('searchByKeywords');