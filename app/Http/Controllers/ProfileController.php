<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show(Request $request): View
    {

        $user = Auth::user();
        return view('profile.orders', compact('user'));
    }
    public function showAll(Request $request)
    {
        $users = User::orderBy('id')->get();
        return view('dashboard.users.manage', compact('users'));
    }
    public function showUserInfo($id): View
    {
        $user = User::with('orders')->findOrFail($id);
        return view('dashboard.users.orders', compact('user'));
    }
    public function storeUser(Request $request)
    {
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

        return redirect()->route('manageUsers');
    }
    public function createUser(): View
    {
        $countries = Country::all();
        return view('dashboard.users.add', [
            'countries' => $countries,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function editUserInfo($id): View
    {
        $countries = Country::all();
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }
    public function updateUserInfo(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
        return redirect()->route('manageUsers');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('manageUsers');
    }
}
