<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class registraion extends Controller
{
    public function index(Request $request){
    
        $validated = $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        
        // Check if a user with the provided email already exists
        $existingUser = User::where('email','LIKE', $validated['email'])->first();
    
        if($existingUser){
            // If the user already exists, redirect them
            session()->flash('message', 'User already exists');
            return redirect('registration'); // You can redirect them to any route you desire
        }
    
        // If the user does not exist, proceed with creating a new user
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']); // Hash the password for security
        $user->save();  
        
        return redirect('login');
    }
    
}
