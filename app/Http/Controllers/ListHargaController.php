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
    public function store(Request $request)
{
    $aksi = $request->input('aksi');
    $layananId = $request->input('nama_layanan');
    $waktu = $request->input('waktu');
    $harga = $request->input('harga');

    if ($aksi === 'tambah') {
        // Cari data layanan dari tabel layanan_laundry berdasarkan ID
        $layanan = LayananLaundry::find($layananId);

        if (!$layanan) {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }

        // Tambahkan data baru ke tabel list_harga
        ListHarga::create([
            'layanan_laundry_id' => $layananId,
            'nama_layanans' => $layanan->nama_layanan, // ambil dari tabel layanan
            'waktu' => $waktu,
            'harga' => $harga
        ]);

        return redirect()->back()->with('success', 'Harga berhasil ditambahkan.');
    }

    if ($aksi === 'edit') {
        
        // Edit data yang cocok berdasarkan layanan, waktu ATAU harga
$data = ListHarga::where('layanan_laundry_id', $layananId)
    ->where(function ($query) use ($waktu, $harga) {
        $query->where('waktu', $waktu)
              ->orWhere('harga', $harga);
    })
    ->first();


        if ($data) {
            // Misalnya kita edit hanya harga (atau bisa waktu juga sesuai kebutuhan)
            $data->update([
                'harga' => $request->input('harga_baru', $harga),
                'waktu' => $request->input('waktu_baru', $waktu),
            ]);

            return redirect()->back()->with('success', 'Harga berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk diedit.');
        }
    }

    if ($aksi === 'hapus') {
        // Hapus data yang cocok
        $deleted = ListHarga::where('layanan_laundry_id', $layananId)
            ->where('waktu', $waktu)
            ->where('harga', $harga)
            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Harga berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk dihapus.');
        }
    }

    return redirect()->back()->with('error', 'Aksi tidak valid.');
}

    public function update(Request $request)
    {
        $request->validate([
            'aksi' => 'required|in:tambah,edit,hapus',
            'nama_layanan' => 'required|string',
            'nama_layanans' => 'required|string',
            'waktu' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric|min:0',
            'nama_detail' => 'nullable|string|max:255',
        ]);

        $userId = Auth::id();
        $aksi = $request->input('aksi');

        $layanan = LayananLaundry::where('nama_layanan', $request->nama_layanan)
            ->where('user_id', $userId)
            ->first();

        if (!$layanan) {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan atau bukan milik Anda.');
        }

        $detail = [];
        if ($request->filled('nama_detail')) {
            $detail[] = $request->input('nama_detail');
        }

        if ($aksi === 'tambah') {
            ListHarga::create([
                'layanan_laundry_id' => $layanan->id,
                'nama_layanans' => $request->nama_layanans,
                'detail' => $detail,
                'harga' => $request->harga,
                'waktu' => $request->waktu,
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
        }

        if ($aksi === 'edit') {
            $item = ListHarga::where('layanan_laundry_id', $layanan->id)
                ->where('nama_layanans', $request->nama_layanans)
                ->first();

            if (!$item) {
                return redirect()->back()->with('error', 'Data tidak ditemukan untuk diedit.');
            }

            $item->update([
                'detail' => $detail,
                'harga' => $request->harga,
                'waktu' => $request->waktu,
            ]);

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        }

        if ($aksi === 'hapus') {
            $item = ListHarga::where('layanan_laundry_id', $layanan->id)
                ->where('nama_layanans', $request->nama_layanans)
                ->first();

            if (!$item) {
                return redirect()->back()->with('error', 'Data tidak ditemukan untuk dihapus.');
            }

            $item->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }
    public function getJenisLayanan($layananId)
{
    $jenisLayanan = ListHarga::where('layanan_laundry_id', $layananId)->pluck('nama_layanans');
    
    return response()->json($jenisLayanan);
}

}
