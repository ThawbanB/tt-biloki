<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        if($user->role == 'admin'){
            return redirect()->route('dashboard');
        }
        else {
            return view ("Page-user");
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('Auth')->with('error', 'Email or password is incorrect');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('Auth')->with('error', 'Email or password is incorrect');
        }

        Auth::login($user);
        if($user->role == 'admin'){
            return redirect()->route('dashboard');
        }
        else {
            return view ("Page-user");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
