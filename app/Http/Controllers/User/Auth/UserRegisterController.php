<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserRegisterController extends Controller
{
    /**
     * Show the user registration form.
     */
    public function showRegisterForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('profile');
        }
        
        return view('user.auth.register');
    }

    /**
     * Handle user registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'nullable|string|max:20',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        Auth::guard('web')->login($customer);

        $request->session()->regenerate();

        return redirect()->route('profile')->with('success', 'Registration successful! Welcome to Ecomarc Punjabi Shop.');
    }
}
