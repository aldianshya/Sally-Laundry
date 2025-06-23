@include('layout.head')


<body class="portfolio-details-page">

    <!-- header -->
    @include('layout.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container1">
                    <div class="title-container my-1" style="position: relative;">
                        <h1 class="heading-title" style="display: inline-block; vertical-align: middle;">Daftar Harga
                        </h1>

                        <!-- Container tombol di kanan atas, posisi absolute supaya di pojok kanan atas container -->
                        <div
                            style="position: absolute; top: 0; right: 0; display: flex; gap: 8px; align-items: center; margin-right: 50px;">


                            <!-- Tombol baru pink berdampingan dengan tombol pensil -->
                            <button onclick="openModalLayanan()"
                                style="background-color: #f06292;border: none;color: white;padding: 8px 14px;border-radius: 20px;font-weight: bold;font-size: 0.9rem;height: 40px;cursor: pointer;">
                                Tambah Layanan
                            </button>
                        </div>

                        {{-- <h2 class="text-center mb-4">Daftar Harga</h2> --}}

                        {{-- content --}}
                        <!-- Paket Laundry Kiloan -->
                        <div class="mb-4">
                            <h5 class="fw-bold text-center text-white mx-auto"
                                style="background-color: #b11050; border-radius: 20px; padding: 8px; width: 50%;">
                                PAKET LAUNDRY KILOAN
                                <!-- Tombol pensil -->
                                <button onclick="openModalKilo()"
                                    style="padding: 0;width: 40px;height: 40px;border: none;outline: none;background-color: #b11050;cursor: pointer;">
                                    <img src="asset/pensil.png" alt="Edit"
                                        style="width: 100%; height: 100%; object-fit: contain;">
                                </button>
                            </h5>

                            <div class="container mt-3">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center">
                                    @foreach ($layananLaundryList as $layanan)
                                        @if ($layanan->kategori === 'kiloan')
                                            @php
                                                $filteredPrices = $prices->where('layanan_laundry_id', $layanan->id);
                                            @endphp
                                            <div class="col d-flex">
                                                <div class="p-3 rounded shadow w-100"
                                                    style="background-color: #f06292; color: white; min-height: 100%; min-width: 250px;">
                                                    <h6 class="fw-bold">{{ $layanan->nama_layanan }}</h6>
                                                    @if ($filteredPrices->isEmpty())
                                                        <p>Rp</p>
                                                    @else
                                                        @foreach ($filteredPrices as $price)
                                                            <p>{{ $price->waktu }}
                                                                Rp{{ number_format($price->harga, 0, ',', '.') }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>



                        </div>

                        <div class="row justify-content-center align-items-start">
                            <!-- Paket Laundry Satuan -->
                            <div class="col-md-7 mb-4">
                                <h5 class="fw-bold text-center text-white mx-auto"
                                    style="background-color: #b11050; border-radius: 20px; padding: 8px; width: 60%">
                                    PAKET LAUNDRY SATUAN
                                    <button onclick="openModalSatuan()"
                                        style="padding: 0;width: 40px;height: 40px;border: none;outline: none;background-color: #b11050;cursor: pointer;">
                                        <img src="asset/pensil.png" alt="Edit"
                                            style="width: 100%; height: 100%; object-fit: contain;">
                                    </button>
                                </h5>
                                <div class="p-3 rounded shadow" style="background-color: #f06292; color: white;">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($layananLaundryList as $layanan)
                                            @if ($layanan->kategori === 'satuan')
                                                @php
                                                    $filteredPrices = $prices->where(
                                                        'layanan_laundry_id',
                                                        $layanan->id,
                                                    );
                                                @endphp

                                                @if ($filteredPrices->isEmpty())
                                                    <li class="d-flex justify-content-between">
                                                        <span>{{ $layanan->nama_layanan }}</span>
                                                        <span>/ Kg</span> {{-- Tanda jika tidak ada harga --}}
                                                    </li>
                                                @else
                                                    @foreach ($filteredPrices as $price)
                                                        <li class="d-flex justify-content-between">
                                                            <span>{{ $layanan->nama_layanan }}</span>
                                                            <span>Rp{{ number_format($price->harga, 0, ',', '.') }} /
                                                                Kg</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div>


                            <!-- Paket Bulanan -->
                            <div class="col-md-4 mb-4">

                                {{-- Paket Bulanan I --}}
                                <div class="text-center mb-3">
                                    <h5 class="fw-bold text-white py-2 px-3 rounded"
                                        style="background-color: #b11050; display: inline-block;">PAKET BULANAN I
                                        <button onclick="openModalBln1()"
                                            style="padding: 0;width: 40px;height: 40px;border: none;outline: none;background-color: #b11050;cursor: pointer;">
                                            <img src="asset/pensil.png" alt="Edit"
                                                style="width: 100%; height: 100%; object-fit: contain;">
                                        </button>
                                    </h5>

                                    <div class="p-4 mt-2 rounded shadow"
                                        style="background-color: #f06292; color: white;">
                                        @php
                                            $bulanan1 = $layananLaundryList->where('kategori', 'bulanan I');
                                        @endphp
                                        @if ($bulanan1->isNotEmpty())
                                            @php
                                                $hargaBulanan1 =
                                                    $prices
                                                        ->where('layanan_laundry_id', $bulanan1->first()->id)
                                                        ->first()->harga ?? 0;
                                            @endphp
                                            <p class="fs-5 fw-bold">Rp{{ number_format($hargaBulanan1, 0, ',', '.') }}
                                            </p>
                                            <ul class="text-start" style="list-style: none; padding: 0;">
                                                @foreach ($bulanan1 as $layanan)
                                                    <li>{{ $layanan->nama_layanan }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>Tidak ada layanan.</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Paket Bulanan II --}}
                                <div class="text-center">
                                    <h5 class="fw-bold text-white py-2 px-3 rounded"
                                        style="background-color: #b11050; display: inline-block;">PAKET BULANAN II
                                        <button onclick="openModalBln2()"
                                            style="padding: 0;width: 40px;height: 40px;border: none;outline: none;background-color: #b11050;cursor: pointer;">
                                            <img src="asset/pensil.png" alt="Edit"
                                                style="width: 100%; height: 100%; object-fit: contain;">
                                        </button>
                                    </h5>
                                    <div class="p-4 mt-2 rounded shadow"
                                        style="background-color: #f06292; color: white;">
                                        @php
                                            $bulanan2 = $layananLaundryList->where('kategori', 'bulanan II');
                                        @endphp
                                        @if ($bulanan2->isNotEmpty())
                                            @php
                                                $hargaBulanan2 =
                                                    $prices
                                                        ->where('layanan_laundry_id', $bulanan2->first()->id)
                                                        ->first()->harga ?? 0;
                                            @endphp
                                            <p class="fs-5 fw-bold">Rp{{ number_format($hargaBulanan2, 0, ',', '.') }}
                                            </p>
                                            <ul class="text-start" style="list-style: none; padding: 0;">
                                                @foreach ($bulanan2 as $layanan)
                                                    <li>{{ $layanan->nama_layanan }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>Tidak ada layanan.</p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout.footer2')

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('list-harga.update') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                            <input type="hidden" name="id" id="delete-id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="aksi" value="hapus" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">UBAH
                            DAFTAR
                            HARGA</h5>

                        <form id="editForm" action="{{ route('list-harga.update') }}" method="POST">
                            @csrf

                            <!-- Pilih Layanan Laundry -->
                            <div class="mb-3">
                                <input type="text" id="edit-layanan" name="layanan"
                                    class="form-control rounded-pill text-center shadow-sm" readonly>
                            </div>

                            <!-- Waktu & Harga -->
                            <div class="d-flex justify-content-between gap-2 mb-3">
                                <input type="text" id="edit-waktu" name="waktu"
                                    class="form-control rounded-pill text-center shadow-sm" required>
                                <input type="number" id="edit-harga" name="harga"
                                    class="form-control rounded-pill text-center shadow-sm" required>
                            </div>

                            <!-- ID tersembunyi untuk edit/hapus -->
                            <input type="hidden" id="edit-id" name="id" value="">

                            <!-- Tombol: Batal + EDIT -->
                            <div class="d-flex justify-content-center gap-5 mb-3">
                                <button type="submit" data-bs-dismiss="modal"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #832f42;">Batal</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">Edit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Transaksi Pembayaran -->
        <div class="modal" id="modalLayanan">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="form2ModalLabel">Tambah Layanan</h5>

                        <form action="{{ route('layanan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Nama Layanan" name="nama_layanan" required>
                            </div>
                            <div class="mb-3">
                                <select name="kategori" class="form-control rounded-pill text-center shadow-sm"
                                    required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="satuan">Satuan</option>
                                    <option value="bulanan I">Bulanan I</option>
                                    <option value="bulanan II">Bulanan II</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="btn btn-success fw-bold rounded-pill px-4">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Ubah Daftar Harga -->
        <div class="modal" id="modalKilo">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">TAMBAH DAFTAR HARGA</h5>

                        <form action="{{ route('list-harga.Store') }}" method="POST">
                            @csrf

                            <!-- Nama Layanan -->
                            <!-- Nama Layanan -->
                            <div class="mb-3">
                                <label for="nama_layanan" class="form-label">Pilih Nama Layanan</label>
                                <select name="nama_layanan" class="form-control rounded-pill text-center shadow-sm"
                                    required>
                                    <option value="" disabled selected>-- Pilih Layanan --</option>
                                    @foreach ($layananLaundryList as $paket)
                                        @if ($paket->kategori === 'kiloan')
                                            <option value="{{ $paket->id }}">{{ $paket->nama_layanan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Waktu -->
                            <div class="input-row">
                                <div class="input-label">Waktu</div>
                                <div class="input-field">
                                    <input type="text" name="waktu" class="form-control"
                                        placeholder="Masukkan Waktu (contoh: 6 Jam)">
                                </div>
                            </div>

                            <!-- Harga -->
                            <div class="input-row">
                                <div class="input-label">Harga</div>
                                <div class="input-field">
                                    <input type="number" name="harga" class="form-control"
                                        placeholder="Masukkan Harga (contoh: 12000)">
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-center gap-3 mb-2">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">TAMBAH</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #462727;">EDIT</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="aksi" value="hapus"
                                    class="btn text-white fw-bold rounded-pill px-4 mt-2"
                                    style="background-color: #ff0000;">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ubah Daftar Harga -->
        <div class="modal" id="modalSatuan">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">TAMBAH DAFTAR HARGA</h5>

                        <form action="{{ route('list-harga.Store') }}" method="POST">
                            @csrf

                            <!-- Nama Layanan -->
                            <!-- Nama Layanan -->
                            <div class="mb-3">
                                <label for="nama_layanan" class="form-label">Pilih Nama Layanan</label>
                                <select name="nama_layanan" class="form-control rounded-pill text-center shadow-sm"
                                    required>
                                    <option value="" disabled selected>-- Pilih Layanan --</option>
                                    @foreach ($layananLaundryList as $paket)
                                        @if ($paket->kategori === 'satuan')
                                            <option value="{{ $paket->id }}">{{ $paket->nama_layanan }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            <!-- Harga -->
                            <div class="input-row">
                                <div class="input-label">Harga</div>
                                <div class="input-field">
                                    <input type="number" name="harga" class="form-control"
                                        placeholder="Masukkan Harga (contoh: 12000)">
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-center gap-3 mb-2">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">TAMBAH</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #462727;">EDIT</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="aksi" value="hapus"
                                    class="btn text-white fw-bold rounded-pill px-4 mt-2"
                                    style="background-color: #ff0000;">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ubah Daftar Harga -->
        <div class="modal" id="modalBln1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">TAMBAH DAFTAR HARGA</h5>

                        <form action="{{ route('list-harga.Store') }}" method="POST">
                            @csrf

                            <!-- Nama Layanan -->
                            <!-- Nama Layanan -->
                            <div class="mb-3">
                                <label for="nama_layanan" class="form-label">Silahkan Langsung Memberikan
                                    Harga</label>
                                @php
                                    $paketBulanan = $layananLaundryList->firstWhere('kategori', 'bulanan I');
                                @endphp

                                @if ($paketBulanan)
                                    <input type="hidden" name="nama_layanan" value="{{ $paketBulanan->id }}">
                                @endif



                            </div>
                            <!-- Harga -->
                            <div class="input-row">
                                <div class="input-label">Harga</div>
                                <div class="input-field">
                                    <input type="number" name="harga" class="form-control"
                                        placeholder="Masukkan Harga (contoh: 12000)">
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-center gap-3 mb-2">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">TAMBAH</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #462727;">EDIT</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="aksi" value="hapus"
                                    class="btn text-white fw-bold rounded-pill px-4 mt-2"
                                    style="background-color: #ff0000;">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ubah Daftar Harga -->
        <div class="modal" id="modalBln2">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">TAMBAH DAFTAR HARGA</h5>

                        <form action="{{ route('list-harga.Store') }}" method="POST">
                            @csrf

                            <!-- Nama Layanan -->
                            <!-- Nama Layanan -->
                            <div class="mb-3">
                                <label for="nama_layanan" class="form-label">Silahkan Langsung Memberikan
                                    Harga</label>
                                @php
                                    $paketBulanan = $layananLaundryList->firstWhere('kategori', 'bulanan II');
                                @endphp

                                @if ($paketBulanan)
                                    <input type="hidden" name="nama_layanan" value="{{ $paketBulanan->id }}">
                                @endif


                            </div>
                            <!-- Harga -->
                            <div class="input-row">
                                <div class="input-label">Harga</div>
                                <div class="input-field">
                                    <input type="number" name="harga" class="form-control"
                                        placeholder="Masukkan Harga (contoh: 12000)">
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-center gap-3 mb-2">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">TAMBAH</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #462727;">EDIT</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="aksi" value="hapus"
                                    class="btn text-white fw-bold rounded-pill px-4 mt-2"
                                    style="background-color: #ff0000;">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function openModalLayanan() {
                document.getElementById("modalLayanan").style.display = "block";
            }

            function openModalKilo() {
                document.getElementById("modalKilo").style.display = "block";
            }

            function openModalSatuan() {
                document.getElementById("modalSatuan").style.display = "block";
            }

            function openModalBln1() {
                document.getElementById("modalBln1").style.display = "block";
            }

            function openModalBln2() {
                document.getElementById("modalBln2").style.display = "block";
            }


            function closeModal() {
                document.getElementById("modalLayanan").style.display = "none";
                document.getElementById("modalKilo").style.display = "none";
                document.getElementById("modalSatuan").style.display = "none";
                document.getElementById("modalBln1").style.display = "none";
                document.getElementById("modalBln2").style.display = "none";
            }

            // Tutup modal jika klik di luar
            window.onclick = function(event) {
                const modalLayanan = document.getElementById("modalLayanan");
                if (event.target === modalLayanan) {
                    modalLayanan.style.display = "none";
                }
                const modalKilo = document.getElementById("modalKilo");
                if (event.target === modalKilo) {
                    modalKilo.style.display = "none";
                }
                const modalSatuan = document.getElementById("modalSatuan");
                if (event.target === modalSatuan) {
                    modalSatuan.style.display = "none";
                }
                const modalBln1 = document.getElementById("modalBln1");
                if (event.target === modalBln1) {
                    modalBln1.style.display = "none";
                }
                const modalBln2 = document.getElementById("modalBln2");
                if (event.target === modalBln2) {
                    modalBln2.style.display = "none";
                }

            }
        </script>
</body>

<!-- SweetAlert2 CSS & JS -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layout.modal')
@include('layout.script')

</html>
