<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AutManager extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function home()
{
    return view('home');
}

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with("Success", "");
        }

        return redirect()->route('login')->with("error", "Login details are not valid");
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect()->route('registration')->with("Error", "Register failed! Try again");
        }

        return redirect()->route('login')->with("Success", "Registration successful! Please log in.");
    }

   public function logout()
{
    Session::flush();            // Clear all session data
    Auth::logout();              // Logout the user

    return redirect()->route('login')->with('success', 'You have been logged out successfully.');
}

}
