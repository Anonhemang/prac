<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('show');
});

Route::get('add', function () {
    return view('addpost');
});

Route::get('view', function () {
    return view('view');
});

Route::get('index', function () {
    return view('home');
});

Route::get('register', function () {
    return view('registration');
});

Route::get('login', function () {
    return view('login');
});

Route::get('cate', function () {
    return view('cat');
});


// Add Category Controller
Route::get('addcate', [AddCategoryController::class, 'addcate'])->name('addcate');
Route::post('addcate', [AddCategoryController::class, 'store'])->name('added');
Route::get('add', [AddCategoryController::class, 'disp'])->name('add');

// Add Post Controller
Route::post('add', [AddPostController::class, 'store'])->name('addpost');
Route::get('/', [AddPostController::class, 'disp']);
Route::get('index', [AddPostController::class, 'home']);
// Route::get('search', [AddPostController::class , 'search']);

// Route::get('search', [SearchController::class , 'search']);

// Extra Controller
Route::get('view/{id}', [ExtraController::class, 'show'])->name('view');
Route::get('/delete/{id}', [ExtraController::class, 'delete'])->name('delet');
Route::get('logout', [ExtraController::class, 'logout'])->name('logout');
Route::get('edit/{id}', [ExtraController::class, 'edit'])->name('edit');
Route::put('/editpost/{id}', [ExtraController::class, 'editpost']);

// Registration Controller
Route::post('register', [RegisterController::class, 'registeruser'])->name('register');
Route::post('index', [RegisterController::class, 'login'])->name('login.process');
Route::get('login', [RegisterController::class, 'logview'])->name('login');
