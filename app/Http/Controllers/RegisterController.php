<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function registeruser(Request $request)
  {
    $store = $request->validate([
      'uname' => 'required',
      'pass' => 'required',
      'created_at' => 'date',
    ]);
    $save = Register::create([
      'uname' => $store['uname'],
      'pass' => Hash::make($store['pass']),
      'created_at' => now()->format('Y-m-d'),
    ]);
    if ($save) {
      return redirect('login');
    } else {
      return redirect('register')->with('error', 'Registration failed');
    }
  }



  public function login(Request $request)
  {
    $credentials = $request->validate([
      'uname' => 'required',
      'pass' => 'required',
    ]);

    if (Auth::attempt(['uname' => $credentials['uname'], 'password' => $credentials['pass']])) {
      $request->session()->regenerate();
      $request->session()->put('u_id', Auth::id());
      return redirect()->intended('index');
    }
    
    return back()->withErrors([
      'uname' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logview()
  {
    return view('login');
  }

}
