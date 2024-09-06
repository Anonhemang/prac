<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddCategory;
use App\Models\AddPost;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class ExtraController extends Controller
{
    public function show($id)
    {
        $show = AddPost::find($id);
        return view('view', compact('show'));
    }
    public function addnew()
    {
        return view('addpost');

    }
    public function delete($id)
    {
        $delete = AddPost::find($id);
        if ($delete) {
            $delete->delete();
            return redirect('index');
        }
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->forget('u_id');
        session()->invalidate(); // Invalidate the session
        session()->regenerateToken();
        return redirect()->route('login');
    }
    // today
    function edit($id)
    {
        $post = AddPost::find($id); //fetch post details
        $catt = AddCategory::all(); //fetch all categories from category table
        return view('editpost', ['data' => $post, 'catdata' => $catt]);
    }


    function editpost(Request $request, $id)
    {
        $student = AddPost::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $student->image = $filename;
        }
        $student->title = $request->title;
        $student->content = $request->content;
        if (is_array($request->category)) {
            $student->category = implode(' , ', $request->category);
        }
        if ($student->save()) {
            return redirect('index');
        } else {
            return redirect('edit');
        }
    }

}
