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

    public function userList()
    {
        $users = User::all();
        return view('dashboard.user.index', [
            'title' => 'Edu Class | User List',
            'users' => $users 
        ]);
    }

    public function userCreate()
    {
        return view('dashboard.user.create', [
            'title' => 'Edu Class | User Add'
        ]);
    }

    public function userCreateAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:teacher,student,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->first_name . ' ' . $request->last_name,
            'role' => $request->role,
        ]);

        return redirect()->route('user.list')->with('success', 'User created successfully.');
    }

    public function userEdit(User $user)
    {
        return view('dashboard.user.update',  [
            'title' => 'Edu Class | User Edit',
            'user' => $user 
        ]);
    }


    public function userUpdate(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:teacher,student,admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'fullname' => $request->first_name . ' ' . $request->last_name,
            'role' => $request->role,
        ]);

        return redirect()->route('user.list')->with('success', 'User updated successfully.');
    }

    public function userDelete(User $user)
    {
        $user->delete();
        return redirect()->route('user.list')->with('success', 'User deleted successfully.');
    }

}
