<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListHarga;
use App\Models\LayananLaundry;
use App\Models\Pelanggan;
use App\Models\Tranksaksi;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TransaksiController;
use Carbon\Carbon;



class RekapitulasiController extends Controller
{
    public function index()
    {
        
        $userId = Auth::id();

        $prices = ListHarga::whereHas('layananlaundry', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('layananlaundry')->get();
        $pelanggan = Pelanggan::all();
        $totalPendapatan = Tranksaksi::whereHas('pelanggan', function ($query) use ($userId) {
        $query->where('id_user', $userId);
    })->sum('total_harga');
    $jumlahPesanan = Tranksaksi::whereHas('pelanggan', function ($query) use ($userId) {
        $query->where('id_user', $userId);
    })->count();
    $jumlahPelanggan = Tranksaksi::whereHas('pelanggan', function ($query) use ($userId) {
        $query->where('id_user', $userId);
    })->distinct('id_pelanggan')->count('id_pelanggan');
    $transaksis = Tranksaksi::whereHas('pelanggan', function ($query) use ($userId) {
    $query->where('id_user', $userId);
})->with('pelanggan', 'listharga')->get();
// Grup Harian
$transaksiUser = Tranksaksi::whereHas('pelanggan', function ($query) use ($userId) {
    $query->where('id_user', $userId);
});
$harian = $transaksiUser->get()->groupBy(function ($item) {
    return Carbon::parse($item->created_at)->format('d-m-Y');
})->map->count()->toArray();

// Grup Mingguan (minggu ke berapa dalam tahun)
$mingguan = $transaksiUser->get()->groupBy(function ($item) {
    return 'Minggu ' . Carbon::parse($item->created_at)->weekOfYear;
})->map->count()->toArray();

// Grup Bulanan
$bulanan = $transaksiUser->get()->groupBy(function ($item) {
    return Carbon::parse($item->created_at)->format('F'); // Misal: 'Juni'
})->map->count()->toArray();

        $layananLaundryList = LayananLaundry::where('user_id', $userId)->get();

        return view('user.rekapitulasi', compact('prices', 'layananLaundryList', 'pelanggan','totalPendapatan','jumlahPesanan'
    ,'jumlahPelanggan','transaksis','harian', 'mingguan', 'bulanan'));
    }
    public function waktu($id)
    {
        
        $userId = Auth::id();
        $transaksi = Tranksaksi::with('pelanggan')->findOrFail($id); // Ambil data lengkap transaksi
    return view('user.estimasi_waktu', compact('transaksi'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nomor_hp'       => 'required|string|max:20',
            'nama_pelanggan' => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'nama_layanan'   => 'required|string',
            'waktu'          => 'required|string',
            'berat'          => 'required|numeric',
            'estimasi'       => 'required|date',
            'total_bayar'    => 'required|numeric',
            'hp_sudah_ada'   => 'required|in:0,1',
        ]);

        $userId = Auth::id();

        // Cek apakah pelanggan sudah ada
        if ($request->hp_sudah_ada == "1") {
            $pelanggan = Pelanggan::where('nomor_hp', $request->nomor_hp)->first();

            if (!$pelanggan) {
                return back()->withErrors(['nomor_hp' => 'Nomor HP tidak ditemukan.']);
            }
        } else {
            $cek = Pelanggan::where('nomor_hp', $request->nomor_hp)->first();
            if ($cek) {
                return back()->withErrors(['nomor_hp' => 'Nomor HP sudah ada.']);
            }

            $pelanggan = Pelanggan::create([
                'nama_pelanggan'    => $request->nama_pelanggan,
                'nomor_hp'   => $request->nomor_hp,
                'user_id' => $userId,
            ]);
        }

        // Cari id_list_harga berdasarkan nama layanan dan waktu
        $listHarga = ListHarga::where('nama_layanans', $request->nama_layanan)
                        ->where('waktu', $request->waktu)
                        ->first();

        if (!$listHarga) {
            return back()->withErrors(['nama_layanan' => 'Layanan dan waktu tidak valid.']);
        }

        // Simpan transaksi
        $tranksaksi = Tranksaksi::create([
            'id_user'          => $userId,
            'id_list_harga'    => $listHarga->id,
            'id_pelanggan'     => $pelanggan->id,
            'tanggal_masuk'    => $request->tanggal,
            'estimasi_selesai' => $request->estimasi,
            'berat' => $request->berat,
            'total_harga'      => $request->total_bayar,
            'dicuci'           => false,
            'diproses'         => false,
            'disetrika'        => false,
            'dikemas'          => false,
            'selesai'          => false,
        ]);
        // Generate struck: STRK-YYYYMMDD-IDUSER-IDTRANSAKSI
$struck = now()->format('ymd') . $userId . $tranksaksi->id;

// Update kolom struck
$tranksaksi->update(['struck' => $struck]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
    }
    public function update(Request $request, $id, $proses)
{
    $transaksi = Tranksaksi::findOrFail($id);

    // Cek validitas proses yang diperbolehkan
    $allowed = ['dicuci', 'diproses', 'disetrika', 'dikemas', 'selesai'];
    if (!in_array($proses, $allowed)) {
        abort(400, 'Proses tidak valid.');
    }

    // Set field jadi true
    $transaksi->{$proses} = true;
    $transaksi->save();

    return redirect()->back()->with('success', 'Status ' . ucfirst($proses) . ' telah diperbarui!');
}

}
