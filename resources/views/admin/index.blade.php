@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="custom-bg d-none d-sm-inline-block btn btn-sm btn-light shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Selamat Datang, Admin Sally Laundry!</h5>
            <p class="card-text">
                Di halaman dashboard ini, Anda dapat mengelola seluruh keuangan toko Sally Laundry
                dengan mudah dan efisien.
                Selain itu, Anda juga memiliki kontrol penuh untuk mengatur tampilan dashboard halaman
                utama sesuai kebutuhan Anda.
            </p>

            {{-- Tambahkan Form Edit Profil Usaha --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profil-usaha.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control" value="{{ old('nama_usaha', $profil->nama_usaha ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Judul Slogan</label>
                    <input type="text" name="judul_slogan" class="form-control" value="{{ old('judul_slogan', $profil->judul_slogan ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Subjudul Slogan</label>
                    <input type="text" name="subjudul_slogan" class="form-control" value="{{ old('subjudul_slogan', $profil->subjudul_slogan ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Deskripsi Profil</label>
                    <textarea name="deskripsi_profil" rows="4" class="form-control">{{ old('deskripsi_profil', $profil->deskripsi_profil ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Catatan Tambahan</label>
                    <textarea name="catatan_tambahan" rows="2" class="form-control">{{ old('catatan_tambahan', $profil->catatan_tambahan ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Gambar Profil:</label><br>
                    @if (!empty($profil->gambar_profil))
                        <img src="{{ asset('storage/' . $profil->gambar_profil) }}" width="200" class="mb-2">
                    @endif
                    <input type="file" name="gambar_profil" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>Gambar Ilustrasi:</label><br>
                    @if (!empty($profil->gambar_ilustrasi))
                        <img src="{{ asset('storage/' . $profil->gambar_ilustrasi) }}" width="200" class="mb-2">
                    @endif
                    <input type="file" name="gambar_ilustrasi" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>

</div>
@endsection
