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
}
