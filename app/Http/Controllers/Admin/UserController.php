<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'is_admin' => 'boolean',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['is_admin'] = $request->has('is_admin');

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt!');
    }

    public function toggleAdmin(User $user)
    {
        $user->update(['is_admin' => !$user->is_admin]);
        return redirect()->route('admin.users.index')->with('success', 'Admin status aangepast!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd!');
    }
}