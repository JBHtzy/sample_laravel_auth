<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new user
        $user = User::create([
            'name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        Auth::login($user);

        return redirect()->route('show.login')->with('message', [
            'title' => 'Success!',
            'text' => 'Registered successfully.',
            'icon' => 'success',
        ]);
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->route('dashboard')->with('message', [
                'title' => 'Success!',
                'text' => 'Welcome to dashboard' . ' ' . $user->name,
                'icon' => 'success',
            ]);
        }

        return redirect()->route('show.login')->with('message', [
            'title' => 'Error!',
            'text' => 'The provided credentials not exist.',
            'icon' => 'error',
        ]);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // remove session data and regenerate csrf token after logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
