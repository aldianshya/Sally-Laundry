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
        'no_hp.required' => 'Nomor Handphone wajib diisi.',
        'password.required' => 'Kata sandi wajib diisi.',
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

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.index')->with('success', 'Login berhasil sebagai Admin!');
        }

        return redirect('/dashboard')->with('success', 'Login berhasil! Selamat Datang');
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
