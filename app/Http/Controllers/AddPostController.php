<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddCategory;
use App\Models\AddPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public function disp(Request $request)
    {
        $query = AddPost::query();
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', "%{$searchTerm}%");
        }
        if ($request->filled('s_date')) {
            $s_date = $request->input('s_date');
            $query->where('created_at', '=', $s_date);
        }

        // category
        if ($request->filled('cat')) {
            $categories = $request->input('cat');
            $implodedCategories = implode(' , ', $categories);
            $query->where('category', 'like', "%{$implodedCategories}%");
        }

        $data = $query->paginate(4);
        $homecat = AddCategory::all();
        return view('show', [
            'data' => $data,
            'homecat' => $homecat,
            'searchTerm' => $searchTerm ?? '',
            's_date' => $s_date ?? '',
            'category' => $categories ?? '',

        ]);
    }


    public function home(Request $request)
    {
        if (Auth::check()) {

            $query = AddPost::where('u_id', Auth::id());
            if ($request->filled('search')) {
                $searchTerm = $request->input('search');
                $query->where('title', 'like', "%{$searchTerm}%");
            }
            
            if ($request->filled('cat')) {
                $categories = $request->input('cat');
                $implodedCategories = implode(' , ', $categories);
                $query->where('category', 'like', "%{$implodedCategories}%");
            }
            if ($request->filled('s_date')) {
                $s_date = $request->input('s_date');
                $query->whereDate('created_at', '=', $s_date);
            }
            $data = $query->paginate(4);
            $homecat = AddCategory::all();
            $username = session('name');
            return view('home', [
                'data' => $data,
                'homecat' => $homecat,
                'username' => $username,
                'searchTerm' => $searchTerm ?? '',
                's_date' => $s_date ?? '',
                'category' => $categories ?? '',
            ]);
        } else {
            return redirect('login');
        }
    }


}