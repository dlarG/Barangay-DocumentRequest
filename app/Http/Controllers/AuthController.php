<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AuthController extends Controller
{
    public function loginview() {
        return view('auth.login');
    }
    public function registerview() {
        return view('auth.register');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully!.');
    }
    public function register(Request $request) {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9_]+$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ]);

        $user = User::create([
            'firstname' => $validated['firstname'],
            'middlename' => $validated['middlename'],
            'lastname' => $validated['lastname'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'roleType' => 'resident'
        ]);

        event(new Registered($user));

        return redirect('/login')->with('success', 'Registration succesfully please check your email for verification.');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) 
            ? 'email' 
            : 'username';

        if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']], $request->remember)) {
            $request->session()->regenerate();


            if (!Auth::user()->hasVerifiedEmail()) {
                Auth::logout();
                return back()->with('error', 'You must verify your email address before logging in.')->withInput();
            }

            return $this->redirectToDashboard();
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.'
        ])->onlyInput('login');
    }

    protected function redirectToDashboard() {
        $user = Auth::user();
        
        switch ($user->roleType) {
            case 'admin':
                return redirect()->intended(route('admin.dashboard'));
            case 'resident':
                return redirect()->intended(route('resident.dashboard'));
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'login' => 'Invalid user role configuration'
                ]);
        }
    }
}
