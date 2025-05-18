<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListHarga;
use App\Models\LayananLaundry;
use Illuminate\Support\Facades\Auth;

class ListHargaController extends Controller
{
    public function index()
{
    $userId = Auth::id();

    $prices = ListHarga::whereHas('layananlaundry', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })->with('layananlaundry')->get();

    $layananLaundryList = LayananLaundry::where('user_id', $userId)->get();

    return view('user.list-harga', compact('prices', 'layananLaundryList'));
}


    public function update(Request $request)
    {

        $request->validate([
            'aksi' => 'required|string|in:tambah,edit,hapus',
            'id' => 'nullable|integer|exists:list_harga,id',
            // 'layanan_laundry_id' => 'nullable|integer|exists:layanan_laundry,id',
            // 'waktu' => 'required|string|max:255',
            // 'harga' => 'required|numeric|min:0',
        ]);

        $userId = Auth::id();
        $aksi = $request->input('aksi');

        if ($aksi === 'tambah') {
            // Pastikan layanan laundry milik user
            $layanan = LayananLaundry::where('id', $request->layanan_laundry_id)
                ->where('user_id', $userId)
                ->firstOrFail();

            ListHarga::create([
                'layanan_laundry_id' => $layanan->id,
                'waktu' => $request->waktu,
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Harga berhasil ditambahkan.');
        }

        if ($aksi === 'edit') {
            $item = ListHarga::where('id', $request->id)
                ->whereHas('layananlaundry', fn($q) => $q->where('user_id', $userId))
                ->firstOrFail();

            $item->update([
                'waktu' => $request->waktu,
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Harga berhasil diperbarui.');
        }

        if ($aksi === 'hapus') {
            $item = ListHarga::where('id', $request->id)
                ->whereHas('layananlaundry', fn($q) => $q->where('user_id', $userId))
                ->firstOrFail();

            $item->delete();

            return redirect()->back()->with('success', 'Harga berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }
}
