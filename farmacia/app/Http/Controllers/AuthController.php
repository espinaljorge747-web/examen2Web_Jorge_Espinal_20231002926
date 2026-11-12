<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'regex:/@disfarma\.hn$/'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'El correo institucional es obligatorio.',
            'email.email' => 'Ingresa un correo válido.',
            'email.regex' => 'Debes usar tu correo institucional (@disfarma.hn).',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $credentials = $request->only('email', 'password');

        $usuario = User::where('email', $credentials['email'])->first();
        if (! $usuario) {
            return back()
                ->withErrors(['email' => 'Este correo no está registrado.'])
                ->onlyInput('email');
        }

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['password' => 'La contraseña es incorrecta.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('success', '¡Bienvenido al sistema, ' . Auth::user()->name . '!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users', 'regex:/@disfarma\.hn$/'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.regex' => 'Debes usar tu correo institucional (@disfarma.hn).',
            'email.unique' => 'Este correo ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('success', '¡Cuenta creada con éxito!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Has cerrado sesión correctamente.');
    }
}