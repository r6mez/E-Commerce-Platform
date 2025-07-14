<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

use App\Models\Country;
use App\Models\User;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id')->get();
        return view('dashboard.users.manage', compact('users'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('dashboard.users.create', [
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'type' => 'required|in:user,seller,admin',
                'country_id' => 'required|exists:countries,id',
                'password' => 'required|string',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'country_id' => $request->country_id,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('manageUsers')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('manageUsers')->with('error', 'An error occurred while creating the user.');
        }
    }

    public function edit(User $user)
    {
        $countries = Country::all();
        return view('dashboard.users.edit', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'type' => 'required|in:admin,seller,user',
                'country_id' => 'required|exists:countries,id',
                'password' => 'required|string',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'country_id' => $request->country_id,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('manageUsers')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('manageUsers')->with('error', 'An error occurred while updating the user.');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('manageUsers')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('manageUsers')->with('error', 'An error occurred while deleting the user.');
        }
    }

    public function show(User $user): View
    {
        return view('dashboard.users.orders', compact('user'));
    }
}
