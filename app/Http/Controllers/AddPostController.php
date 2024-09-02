<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddPost;
use Illuminate\Http\Request;

class AddPostController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'content' => 'required',
            'category' => 'array',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validate['image'] = $filename;
        }

        AddPost::create([
            'image' =>$validate['image'],
            'title' =>$validate['title'],
            'content' =>$validate['content'],
            'category' =>implode(' , ', $request->input('category',[])),
        ]);
        return redirect('/');
    }
    public function disp(){
        $data = AddPost::all();
        return view('show', compact('data'));
    }
    public function home(){
        $data = AddPost::all();
        return view('home', compact('data'));
    }

   
}