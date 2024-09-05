<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPostController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'content' => 'required',
            'category' => 'array',
            'created_at' => 'date',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validate['image'] = $filename;
        }

        AddPost::create([
            'image' => $validate['image'],
            'title' => $validate['title'],
            'content' => $validate['content'],
            'category' => implode(' , ', $request->input('category', [])),
            'u_id' => Auth::id(),
            'created_at' => now()->format('Y-m-d'),
        ]);
        return redirect('index');
    }
    public function disp()
    {
        $data = AddPost::paginate(4);
        return view('show', compact('data'));
    }
    public function home()
    {
        if (Auth::check()) {
            $data = AddPost::where('u_id', Auth::id())->get();
            return view('home', compact('data'));
        } else {
            return redirect()->route('login');
        }
    }


}