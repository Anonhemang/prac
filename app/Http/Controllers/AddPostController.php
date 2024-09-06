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
        // Base query for fetching all posts
        $query = AddPost::query();

        // Check if there is a search term
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            // Modify the query to include search
            $query->where('title', 'like', "%{$searchTerm}%");
        }
        if ($request->filled('s_date')) {
            $s_date = $request->input('s_date');
            $query->where('created_at', '=', $s_date);
        }

        // Paginate the results (or adjust as needed)
        $data = $query->paginate(4);

        // Fetch all categories
        $homecat = AddCategory::all();

        return view('show', [
            'data' => $data,
            'homecat' => $homecat,
            'searchTerm' => $searchTerm ?? '',
            's_date' => $s_date ?? '',

        ]);
    }


    public function home(Request $request)
    {
        if (Auth::check()) {
            // Start building the query
            $query = AddPost::where('u_id', Auth::id());
    
            // Check if there is a search term and apply it if present
            if ($request->filled('search')) {
                $searchTerm = $request->input('search');
                $query->where('title', 'like', "%{$searchTerm}%");
            }
    
            // Check if a date was provided and apply it if present
            if ($request->filled('s_date')) {
                $s_date = $request->input('s_date');
                $query->whereDate('created_at', '=', $s_date);  // Ensure date format
            }
    
            // Get paginated results
            $data = $query->paginate(4);
    
            // Fetch categories
            $homecat = AddCategory::all();
    
            // Get username from session
            $username = session('name');
    
            return view('home', [
                'data' => $data,
                'homecat' => $homecat,
                'username' => $username,
                'searchTerm' => $searchTerm ?? '',
                's_date' => $s_date ?? ''
            ]);
        } else {
            return redirect('login');
        }
    }
    

}