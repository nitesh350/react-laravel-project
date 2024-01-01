<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, hastoken ;

    public function showLoginForm()
    {
        // Your login form view logic goes here
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Your login logic goes here
        // For example, you might use Laravel's built-in authentication
        // to handle the login attempt.

        // The code below is just an example, and you should adapt it
        // based on your authentication requirements.
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
