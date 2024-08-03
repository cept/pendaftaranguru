<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(): View
    {
        return view('login');
    }

    public function create(): View
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'unique' => ':attribute sudah digunakan',
            'confirmed' => ':attribute konfirmasi tidak sesuai',
        ];

        $validated = $request->validate([
            'nama' => 'required|min:5|max:50',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|min:5|confirmed|max:50',
            'password_confirmation' => 'required|min:5|max:50',
        ], $messages);
        

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin'] = false;

        User::create($validated);


        //redirect to index
        return redirect()->route('login')->with(['success' => 'Anda berhasil registrasi!']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin) {
                return redirect()->intended('dashboard');  // Arahkan ke dashboard admin
            } else {
                return redirect()->intended('dashboarduser');  // Arahkan ke dashboard pengguna biasa
            }

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
