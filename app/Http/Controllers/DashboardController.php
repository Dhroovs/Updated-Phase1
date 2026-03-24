<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔥 Get user from session
        $user = User::find(session('user_id'));

        return view('dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(session('user_id'));

        $request->validate([
            'name'  => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|digits_between:7,15',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6|confirmed']);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('/dashboard')->with('success', 'Profile updated!');
    }
}