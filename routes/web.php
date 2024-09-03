<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\ExtraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('show');
});
Route::get('add', function(){
    return view('addpost');
});
Route::get('view', function(){
    return view('view');
});
Route::get('index', function(){
    return view('home');
});
Route::get('addcate', [AddCategoryController::class, 'addcate'])->name('addcate');
Route::post('addcate', [AddCategoryController::class, 'store'])->name('added');
Route::get('add', [AddCategoryController::class, 'disp'])->name('add');
Route::post('add', [AddPostController::class, 'store'])->name('addpost');
Route::get('view/{id}', [ExtraController::class, 'show'])->name('view');
Route::get('/', [AddPostController::class, 'disp']);
Route::get('index', [AddPostController::class, 'home']);
Route::get('/delete/{id}', [ExtraController::class, 'delete'])->name('delet');