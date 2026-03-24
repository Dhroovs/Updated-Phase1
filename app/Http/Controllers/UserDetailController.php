<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $details = UserDetail::latest()->get();
        return view('userdetails.index', compact('details'));
    }

    public function create()
    {
        return view('userdetails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'     => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|digits_between:7,15',
            'address'       => 'required|string|max:300',
            'gender'        => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date|before:today',
            'images'        => 'nullable|array|max:5',
            'images.*'      => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'full_name.required'  => 'Full name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email.',
            'phone.required'      => 'Phone number is required.',
            'phone.digits_between'=> 'Phone must be between 7 and 15 digits.',
            'address.required'    => 'Address is required.',
            'gender.required'     => 'Please select a gender.',
            'gender.in'           => 'Invalid gender selected.',
            'date_of_birth.required' => 'Date of birth is required.',
            'date_of_birth.before'   => 'Date of birth must be in the past.',
            'images.max'          => 'You can upload maximum 5 images.',
            'images.*.image'      => 'Only image files are allowed.',
            'images.*.mimes'      => 'Only jpg, jpeg, png files are allowed.',
            'images.*.max'        => 'Each image must be under 2MB.',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                $imagePaths[] = $path;
            }
        }

        UserDetail::create([
            'full_name'     => $request->full_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'images'        => $imagePaths,
        ]);

        return redirect('/records')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $detail = UserDetail::findOrFail($id);
        return view('userdetails.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'     => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|digits_between:7,15',
            'address'       => 'required|string|max:300',
            'gender'        => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date|before:today',
            'images'        => 'nullable|array|max:5',
            'images.*'      => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $detail = UserDetail::findOrFail($id);
        $imagePaths = $detail->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                $imagePaths[] = $path;
            }
        }

        $detail->update([
            'full_name'     => $request->full_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'images'        => $imagePaths,
        ]);

        return redirect('/records')->with('success', 'Record updated!');
    }

    public function destroy($id)
    {
        $detail = UserDetail::findOrFail($id);
        $detail->delete();
        return redirect('/records')->with('success', 'Record deleted!');
    }
}