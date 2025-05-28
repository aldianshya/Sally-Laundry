<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Answer;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $messages = [
        'name.required' => 'Nama wajib diisi.',
        'no_hp.required' => 'Nomor Handphone wajib diisi.',
        'no_hp.unique' => 'Nomor Handphone sudah terdaftar.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi minimal terdiri dari :min karakter.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',
    ];

    $request->validate([
        'no_hp' => 'required|string',
        'password' => 'required',
    ], $messages);

    $credentials = [
        'no_hp' => $request->no_hp,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // keamanan sesi
        return redirect('/dashboard')->with('success', 'Login berhasil! Selamat Datang'); // redirect ke halaman utama
    }

    return back()->with('error', 'Nomor Handphone atau password salah.');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
