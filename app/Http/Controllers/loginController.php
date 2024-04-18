<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function login(){
        return view('login');
    }
        public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
              // Get the authenticated user's ID
            $userId = Auth::id();
            
            // Store the user ID in the session
            $request->session()->put('user_id', $userId);
            if($request->email == 'admin@gmail.com'){
                return redirect()->intended('admin/home');
            }
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request){
        Auth::logout(); // Log the user out

        // Optionally, you can invalidate the session
        $request->session()->invalidate();
        
        // Redirect to the login page or any desired location
        return redirect()->route('login');
    }
}
