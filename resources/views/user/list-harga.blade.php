@include('layout.head')


<body class="portfolio-details-page">

    <!-- header -->
    @include('layout.header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="title-container my-1" style="position: relative;">
                        <h1 class="heading-title" style="display: inline-block; vertical-align: middle;">Daftar Harga
                        </h1>

                        <!-- Container tombol di kanan atas, posisi absolute supaya di pojok kanan atas container -->
                        <div
                            style="position: absolute; top: 0; right: 0; display: flex; gap: 8px; align-items: center;">
                            <!-- Tombol pensil -->
                            <button data-bs-toggle="modal" data-bs-target="#formModal" style="
                padding: 0;
                width: 40px;
                height: 40px;
                border: none;
                outline: none;
                background: none;
                cursor: pointer;
            ">
                                <img src="asset/pensil.png" alt="Edit"
                                    style="width: 100%; height: 100%; object-fit: contain;">
                            </button>

                            <!-- Tombol baru pink berdampingan dengan tombol pensil -->
                            <button data-bs-toggle="modal" data-bs-target="#form2Modal" style="
                background-color: #f06292;
                border: none;
                color: white;
                padding: 8px 14px;
                border-radius: 20px;
                font-weight: bold;
                font-size: 0.9rem;
                height: 40px;
                cursor: pointer;
            ">
                                Tambah Layanan
                            </button>
                        </div>

                        <h3 class="mt-1">Paket Laundry Kiloan</h3>
                    </div>


                    <div class="row mt-3 justify-content-center">
                        @forelse($prices->groupBy('layanan_laundry_id') as $layananId => $groupedPrices)
                            <div class="col-md-4 mb-3">
                                <div class="position-relative p-4 rounded shadow"
                                    style="background-color: #E6618B; color: white;">
                                    <h5 class="fw-bold fst-italic text-center" style="color: white;">
                                        {{ $groupedPrices->first()->layananlaundry->nama_layanan ?? 'Layanan' }}
                                    </h5>
                                    <ul class="text-start mt-3" style="color: black;">
                                        @foreach($groupedPrices as $price)
                                            <li class="d-flex justify-content-between align-items-center">
                                                <span>{{ $price->waktu }} - Rp
                                                    {{ number_format($price->harga, 0, ',', '.') }}</span>
                                                <div class="d-flex gap-1">
                                                    {{-- Tombol Edit --}}
                                                    <button type="button" class="btn btn-sm p-0 btn-edit" data-bs-toggle="modal"
                                                        data-bs-target="#editModal" data-id="{{ $price->id }}"
                                                        data-layanan="{{ $price->layananlaundry->nama_layanan ?? '' }}"
                                                        data-waktu="{{ $price->waktu }}" data-harga="{{ $price->harga }}"
                                                        title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>

                                                    {{-- Tombol Hapus --}}
                                                    <button type="button" class="btn btn-sm p-0 btn-hapus"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        data-id="{{ $price->id }}" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center text-muted">Belum ada data harga laundry.</p>
                            </div>
                        @endforelse
                    </div>





                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="mt-1">Paket Laundry Satuan</h3>
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-md-6 mb-3">
                    <div class="p-4 rounded shadow" style="background-color: #E6618B; color: white;">
                        <ul class="text-start mt-3" style="color: black;">
                            @foreach($layananLaundryList as $price)
                                @if($price->kategori === 'Satuan')
                                    <li><strong>{{ $price->nama_layanan}}</strong></li>
                                @endif
                            @endforeach
                            <!-- @if(count($prices) == 0)
                                <li class="text-center text-muted">Tidak ada data harga.</li>
                                @endif -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @include('layout.footer2')

</body>
<!-- SweetAlert2 CSS & JS -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layout.modal')
@include('layout.script')

</html>