<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function register(Request $request)
  {
    $store = $request->validate([
      'uname' => 'required',
      'pass' => 'required',
      'created_at' => 'date',
    ]);
    Register::create([
      'uname' => $store['uname'],
      'pass' => Hash::make($store['pass']),
      'created_at' => now()->format('Y-m-d'),
    ]);

    return redirect('index');
  }

  public function log()
  {
    return view('login');
  }
}
