<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{

    // Register page
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // handle registration attempt
    public function register(Request $request): RedirectResponse
    {
        // validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)
                                                     ->mixedCase()
                                                     ->letters()
                                                     ->numbers()
                                                     ->symbols()],
            'function_id' => 'nullable|int|min:1',
            'role_id' => 'nullable|int|min:1',

            
        ], [
            'name.required' => 'Voornaam is verplicht.',
            'lastname.required' => 'Achternaam is verplicht.',
            'email.required' => 'E-mailadres is verplicht.',
            'email.email' => 'Geef een geldig e-mailadres op.',
            'email.unique' => 'Dit e-mailadres is al in gebruik.',
            'password.required' => 'Wachtwoord is verplicht.',
            'password.confirmed' => 'Wachtwoorden komen niet overeen.',
            'emergency_contact.required' => 'Contactpersoon voor noodgevallen is verplicht.',
            'contact_number.required' => 'Telefoonnummer van de contactpersoon is verplicht.',
            'blood_type.required' => 'Bloedgroep is verplicht.',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'emergency_contact' => $request->emergency_contact,
            'contact_number' => $request->contact_number,
            'blood_type' => $request->blood_type,
            'function_id' => $request->function_id,
            'role_id' => $request->role_id ?? 1,
            'password' => Hash::make($request->password),
        ]);

        // redirect to dashboard with succes message.
        return redirect()->intended('dashboard')->with('success', 'Registration successful!');
    }


    // Login page

    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Handle authentication attempt.

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function showLogoutForm()
    {
        return view('auth.logout');
    }

    // Handle logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
