<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        
        // Manejar la imagen
        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $data['profile_picture'] = $path;
        }

        // Crear usuario
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'profile_picture' => $data['profile_picture'] ?? null
        ]);

        return redirect('/')->with('success', 'Registro exitoso!');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            return view('admin.dashboard', compact('user'));
        }

        if ($user->isManager()) {
            return view('manager.dashboard', compact('user'));
        }

        abort(403);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
