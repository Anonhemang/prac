<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddCategory;
use App\Models\AddPost;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function show($id)
    {
        $show = AddPost::find($id);
        return view('view', compact('show'));
    }
    // public function fetchcate()
    // {
    //     $categories = AddCategory::all();
    //     // dd($categories);
    //     return view('show', compact('categories'));
    // }

    public function addnew(){
        return  view('addpost');

    }
}
