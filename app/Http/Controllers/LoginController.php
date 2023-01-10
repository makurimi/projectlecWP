<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 1; // Default is 1

    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function registeract(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:User',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function loginact(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if($req->remember){
            Cookie::queue('remember',$req->email,5);
        }
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password],true)) {
            $req->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }


    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/home');
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function passwordreset(Request $req)
    {
        $req->validate([
            'oldpassword' => 'required|current_password',
            'newpassword' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($req->new_password);
        $user->save();
        $req->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }
}
