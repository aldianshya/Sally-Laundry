<?php

namespace App\Http\Controllers;

use App\Models\LayananLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananLaundryController extends Controller
{
    /**
     * Menampilkan semua layanan laundry (dalam satu halaman).
     */
    public function index()
    {
        $layanans = LayananLaundry::where('user_id', Auth::id())->get();
        return view('layanan.index', compact('layanans'));
    }

    /**
     * Menyimpan layanan baru dari form modal.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'required|in:kiloan,satuan,bulanan I,bulanan II',
        ]);

        LayananLaundry::create([
            'user_id' => Auth::id(),
            'nama_layanan' => $request->nama_layanan,
            'kategori' => $request->kategori,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Memperbarui layanan dari form modal.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
        ]);

        $layanan = LayananLaundry::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan laundry.
     */
    public function destroy($id)
    {
        $layanan = LayananLaundry::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus.');
    }
}
