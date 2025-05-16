<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('registerasi');
    }

    public function register(Request $request)
{
    $messages = [
        'name.required' => 'Nama wajib diisi.',
        'no_hp.required' => 'Nomor Handphone wajib diisi.',
        'no_hp.unique' => 'Nomor Handphone sudah terdaftar.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi minimal terdiri dari :min karakter.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',
    ];

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'no_hp' => 'required|string|min:10|max:15|unique:users,no_hp',
        'password' => 'required|string|min:6|confirmed',
    ], $messages);

    $user = User::create([
        'name' => $request->name,
        'no_hp' => $request->no_hp,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);
    return redirect('login')->with('success', 'Registrasi berhasil! Silakan login.');
}

}
