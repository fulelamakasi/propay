<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login():View
    {
        return view('login');
    }

	public function logout()
    {
		Auth::logout(); // logging out user
		return Redirect::to('/'); // redirection to login screen
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            Session::flash('message', 'You have successfully logged in!');

            return redirect()->route('dashboard');
        }
    
        Session::flash('message', 'Your provided credentials do not match our records.');

        return back()->onlyInput('email');
    
    }

    public function home():View
    {
        return view('welcome');
    }

    public function register():View
    {
        return view('register');
    }

}
