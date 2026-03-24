<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3|max:100',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|digits_between:7,15',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Account created! Please login.');
    }

    public function showLogin()
{
    if (session('user_id')) {
        return redirect('/dashboard');
    }
    return view('auth.login');
}

    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password.')->withInput();
    }

   
    session(['user_id' => $user->id]);

    return redirect('/dashboard');
}

    public function logout(Request $request)
{
    $request->session()->flush();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}