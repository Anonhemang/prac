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

Route::get('addcate', [AddCategoryController::class, 'addcate'])->name('addcate');
Route::post('addcate', [AddCategoryController::class, 'store'])->name('added');
Route::get('add', [AddCategoryController::class, 'disp']);
Route::post('add', [AddPostController::class, 'store'])->name('addpost');
Route::get('view/{id}', [ExtraController::class, 'show'])->name('view');
// Route::get('show', [ExtraController::class, 'fetchcate']);
Route::get('', [AddPostController::class, 'disp']);