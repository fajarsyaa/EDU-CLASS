<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.sign_in', [
            'title' => 'Edu Class | Login',
        ]);
    }

    public function authenticate(Request $request)
    {
         // Validasi input
         $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Kredensial login
        $credentials = $request->only('email', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {
            // Jika berhasil, redirect ke dashboard
            return redirect()->route('index')->with('success', 'Selamat datang kembali!');
        }

        // Jika gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function register()
    {
        return view('dashboard.auth.sign_up', [
            'title' => 'Edu Class | Register',
        ]);
    }

    public function register_create(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:teacher,student'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Simpan pengguna baru
        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
    
        // Login pengguna baru
        Auth::login($user);
    
        return redirect()->route('index')->with('success', 'Akun berhasil dibuat. Selamat datang di aplikasi kami!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }
}
