<?php

namespace App\Http\Controllers;

use App\Models\ProfilUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilUsahaController extends Controller
{
    public function index()
    {
        $profil = ProfilUsaha::first(); // anggap hanya ada 1 data
        return view('user.dashboard', compact('profil'));
    }
    public function edit()
    {
        $profil = ProfilUsaha::first(); // anggap hanya ada 1 data
        return view('admin.index', compact('profil'));
    }

        public function update(Request $request)
{
    $request->validate([
        'nama_usaha' => 'required|string|max:255',
        'judul_slogan' => 'required|string|max:255',
        'subjudul_slogan' => 'required|string|max:255',
        'deskripsi_profil' => 'required|string',
        'catatan_tambahan' => 'nullable|string',
        'gambar_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'gambar_ilustrasi' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Ambil data profil, buat baru jika belum ada
    $profil = ProfilUsaha::first() ?? new ProfilUsaha();

    // Isi field teks
    $profil->nama_usaha = $request->nama_usaha;
    $profil->judul_slogan = $request->judul_slogan;
    $profil->subjudul_slogan = $request->subjudul_slogan;
    $profil->deskripsi_profil = $request->deskripsi_profil;
    $profil->catatan_tambahan = $request->catatan_tambahan;

    // Upload gambar profil
    if ($request->hasFile('gambar_profil')) {
        if ($profil->gambar_profil) {
            Storage::disk('public')->delete($profil->gambar_profil);
        }

        // Simpan ke folder storage/app/public/profil_usaha
        $pathProfil = $request->file('gambar_profil')->store('profil_usaha', 'public');
        $profil->gambar_profil = $pathProfil;
    }

    // Upload gambar ilustrasi
    if ($request->hasFile('gambar_ilustrasi')) {
        if ($profil->gambar_ilustrasi) {
            Storage::disk('public')->delete($profil->gambar_ilustrasi);
        }

        $pathIlustrasi = $request->file('gambar_ilustrasi')->store('profil_usaha', 'public');
        $profil->gambar_ilustrasi = $pathIlustrasi;
    }

    $profil->save();

    return back()->with('success', 'Profil usaha berhasil diperbarui!');
}



}
