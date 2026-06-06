<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();

        return view('users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id
        ], [
            'id.required' => 'User ID is required.',
            'id.exists' => 'User does not exist.',
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.'
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('users');
    }
}