<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddCategory;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function addcate(){
        return view('addcategory');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'category' => 'required'
        ]);
        AddCategory::create($validate);
        return redirect('add');
    }

    public function disp(){
        $data = AddCategory::orderBy('category', 'asc')->get();
        return view('addpost', compact('data'));
    }
    
}
