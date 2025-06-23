@include('layout.head')


<body class="portfolio-details-page">
    <script>
        const dataHarian = @json($harian);
        const dataMingguan = @json($mingguan);
        const dataBulanan = @json($bulanan);

        function updateGrafik(label) {
            const grafikContainer = document.getElementById('grafikBars');
            const jumlahPelangganText = document.getElementById('jumlahPelangganText');

            let dataObj = {};
            if (label === 'Harian') {
                dataObj = dataHarian;
            } else if (label === 'Mingguan') {
                dataObj = dataMingguan;
            } else if (label === 'Bulanan') {
                dataObj = dataBulanan;
            }

            // Ambil label dan data (dibatasi 10 item agar grafik tidak terlalu penuh)
            const labels = Object.keys(dataObj).slice(-10);
            const data = Object.values(dataObj).slice(-10);

            const total = data.reduce((a, b) => a + b, 0);
            jumlahPelangganText.innerText = `${total} Pelanggan`;

            grafikContainer.innerHTML = '';

            data.forEach((value, index) => {
                const bar = document.createElement('div');
                bar.style.display = 'flex';
                bar.style.flexDirection = 'column';
                bar.style.alignItems = 'center';

                const barInner = document.createElement('div');
                barInner.style.height = (value * 10) + 'px'; // skala visual
                barInner.style.width = '20px';
                barInner.style.background = '#ef5da8';
                barInner.style.borderRadius = '10px';

                const labelSpan = document.createElement('span');
                labelSpan.innerText = labels[index];
                labelSpan.style.fontSize = '10px';
                labelSpan.style.marginTop = '5px';

                bar.appendChild(barInner);
                bar.appendChild(labelSpan);
                grafikContainer.appendChild(bar);
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            updateGrafik("Mingguan");
            document.querySelectorAll('.dropdown-option')[1].querySelector('.circle').classList.add('active');
        });
    </script>

    <!-- header -->
    @include('layout.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container1">
                    <div class="title-container my-1" style="position: relative;">
                        <h1 class="heading-title" style="display: inline-block; vertical-align: middle;">Rekapitulasi
                        </h1>
                        <!-- Wrapper Filter -->
                        <div style="position: absolute; top: 0; right: 0; margin: 20px 50px;">
                            <div class="filter-wrapper" style="position: relative;">
                                <!-- Button -->
                                <button onclick="toggleDropdown()"
                                    style="
            background-color: #f8e9f0;
            border: none;
            border-radius: 30px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            font-weight: bold;
            color: #c2185b;
        ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c2185b"
                                        viewBox="0 0 16 16">
                                        <path d="M6 10.117V14l4-2v-1.883l5-4.5V2H1v3.617l5 4.5z" />
                                    </svg>
                                    Filter
                                </button>

                                <!-- Dropdown -->
                                <div id="filterDropdown"
                                    style="
            position: absolute;
            top: 110%;
            right: 0;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 12px;
            display: none;
            z-index: 100;
            min-width: 140px;
            animation: fadeIn 0.3s ease-in-out;
        ">
                                    <div class="dropdown-option" onclick="selectOption(this, 'Harian')">
                                        <div class="circle"></div>
                                        <span>Harian</span>
                                    </div>
                                    <div class="dropdown-option" onclick="selectOption(this, 'Mingguan')">
                                        <div class="circle"></div>
                                        <span>Mingguan</span>
                                    </div>
                                    <div class="dropdown-option" onclick="selectOption(this, 'Bulanan')">
                                        <div class="circle"></div>
                                        <span>Bulanan</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Style -->
                        <style>
                            .dropdown-option {
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                padding: 8px 12px;
                                cursor: pointer;
                                border-radius: 8px;
                                transition: background 0.2s ease;
                            }

                            .dropdown-option:hover {
                                background-color: #fce4ec;
                            }

                            .circle {
                                width: 12px;
                                height: 12px;
                                border: 2px solid #c2185b;
                                border-radius: 50%;
                                position: relative;
                            }

                            .circle.active::after {
                                content: "";
                                position: absolute;
                                top: 2px;
                                left: 2px;
                                width: 6px;
                                height: 6px;
                                background-color: #c2185b;
                                border-radius: 50%;
                            }

                            @keyframes fadeIn {
                                from {
                                    opacity: 0;
                                    transform: translateY(-10px);
                                }

                                to {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }
                        </style>

                        <!-- Script -->
                        <script>
                            function toggleDropdown() {
                                const dropdown = document.getElementById('filterDropdown');
                                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                            }

                            function selectOption(el, label) {
                                document.querySelectorAll('.circle').forEach(circle => circle.classList.remove('active'));
                                el.querySelector('.circle').classList.add('active');
                                document.getElementById('filterDropdown').style.display = 'none';

                                // Tambahkan aksi filter di sini (misalnya kirim AJAX, ubah tampilan, dsb)
                                console.log("Filter dipilih:", label);
                            }

                            document.addEventListener('click', function(event) {
                                const filterWrapper = document.querySelector('.filter-wrapper');
                                if (!filterWrapper.contains(event.target)) {
                                    document.getElementById('filterDropdown').style.display = 'none';
                                }
                            });
                        </script>

                        {{-- conten --}}
                        <div class="container py-4">

                            <!-- Ringkasan dan Grafik -->
                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">

                                <!-- Total Pendapatan -->
                                <div
                                    style="flex: 1; min-width: 250px; background: #fff; padding: 20px; border-radius: 20px;box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                    <p style="margin: 0; font-weight: bold;">Total Pendapatan</p>
                                    <h3 style="color: #ef5da8;">
                                        Rp{{ number_format($totalPendapatan, 0, '', '.') }}.000,00</h3>
                                </div>

                                <!-- Jumlah Pesanan -->
                                <div
                                    style="flex: 1; min-width: 250px; background: #fff; padding: 20px; border-radius: 20px;box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                    <p style="margin: 0; font-weight: bold;">Jumlah Pesanan</p>
                                    <h3 style="color: #ef5da8;">{{ $jumlahPesanan }} Pesanan</h3>
                                </div>

                                <!-- Grafik Jumlah Pelanggan -->
                                <!-- Grafik Jumlah Pelanggan Dinamis -->
<div style="flex: 1 100%; background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <p style="margin: 0; font-weight: bold;">Jumlah Pelanggan</p>
    <h3 id="jumlahPelangganText" style="color: #ef5da8;">-</h3>

    <!-- Grafik dinamis -->
    <div id="grafikBars"
        style="display: flex; justify-content: center; align-items: flex-end; gap: 20px; height: 150px; margin-top: 20px;">
        <!-- Bar grafik akan ditambahkan lewat JavaScript -->
    </div>
</div>


                            </div>


                            <!-- Tabel Transaksi -->
                            <div
                                style="margin-top: 20px; background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);width: 100%">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h4>Transaksi</h4>
                                    <button onclick="openModalKilo()"
                                        style="padding: 0;width: 40px;height: 40px;border: none;outline: none;background-color: #ffffff;cursor: pointer;"><span>
                                            <i class="bi bi-pencil-fill"></i></span></button>
                                </div>
                                <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
                                    <thead>
                                        <tr style="background-color: #f8f8f8;">
                                            <th style="padding: 10px;">Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Layanan</th>
                                            <th>Berat</th>
                                            <th>Total Bayar</th>
                                            <th>Estimasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td style="padding: 10px;">
                                                    {{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ $transaksi->pelanggan->nama_pelanggan }}</td>
                                                <td>{{ $transaksi->listharga->nama_layanans ?? '-' }}</td>
                                                <td>{{ $transaksi->berat }}Kg</td>
                                                <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}.000,00
                                                </td>
                                                <td>
                                                    <a href="{{ route('waktu', ['id' => $transaksi->id]) }}">
                                                        @if ($transaksi->selesai)
                                                            <span
                                                                style="background-color: #00c853; color: white; padding: 5px 10px; border-radius: 20px;">
                                                                Selesai
                                                            </span>
                                                        @else
                                                            <span
                                                                style="background-color: #ff4081; color: white; padding: 5px 10px; border-radius: 20px;">
                                                                Ongoing
                                                            </span>
                                                        @endif
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        @include('layout.footer2')
        <!-- Modal Tambah Pelanggan -->
        <div class="modal" id="modalKilo">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h3 style="text-align: center; margin-bottom: 20px;">TAMBAH TRANKSAKSI</h3>
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <input style="border: none; border-radius: 10px; padding: 10px; color: black;"
                                    type="text" name="nomor_hp" id="nomor_hp" placeholder="No. HP">
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama"
                                    style="flex: 1; border: none; border-radius: 10px; padding: 10px; color: black;">
                                {{-- <pre>{{ json_encode($pelanggan, JSON_PRETTY_PRINT) }}</pre> --}}

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const datapelanggan = @json($pelanggan);

                                        const nomor_hp = document.getElementById('nomor_hp');
                                        const nama_pelangganInput = document.getElementById('nama_pelanggan');

                                        const normalize = str => str.replace(/\D/g, '');

                                        function updateNama() {
                                            const matched = datapelanggan.find(p =>
                                                p && normalize(p.nomor_hp) === normalize(nomor_hp.value)
                                            );
                                            nama_pelangganInput.value = matched ? matched.nama_pelanggan : '';
                                        }

                                        nomor_hp.addEventListener('input', updateNama);

                                        if (nomor_hp.value !== '') {
                                            updateNama();
                                        }

                                    });
                                </script>




                                {{-- <script>
                                    function filterHP() {
                                        const nomor_hp = document.getElementById('nomor_hp').value;
                                        const nama_pelanggan = document.getElementById('nama_pelanggan');

                                        // Kosongkan dropdown waktu dulu
                                        namaList.innerHTML = '';

                                        // Filter berdasarkan nama layanan yang sama
                                        const filtered = datapelangganList.filter(item => item.nomor_hp === nomor_hp);

                                        // Isi opsi waktu
                                        filtered.forEach(item => {
                                            const option = document.createElement('option');
                                            option.value = item.nama_pelanggan;
                                            namaList.appendChild(option);
                                        });
                                    }
                                </script> --}}


                                <input style="border: none; border-radius: 10px; padding: 10px; color: black;"
                                    type="hidden" name="hp_sudah_ada" id="hp_sudah_ada" value="0">

                                <!-- Tombol Ya / Tidak -->
                                <div
                                    style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 20px;">
                                    <p style="margin: 0; font-size: 14px; color: white;">Apakah nama telah ada
                                        sebelumnya?</p>
                                    <button id="btn-ya"
                                        style="background-color: #b11050; border: none; border-radius: 6px; padding: 8px 14px; color: white; font-weight: bold;"
                                        type="button" onclick="handleClick(true)">✔ Ya</button>
                                    <button id="btn-tidak"
                                        style="background-color: #b11050; border: none; border-radius: 6px; padding: 8px 14px; color: white; font-weight: bold;"
                                        type="button" onclick="handleClick(false)">✘ Tidak</button>
                                </div>

                                <script>
                                    function handleClick(isYes) {
                                        // Menyembunyikan tombol yang tidak dipilih
                                        if (isYes) {
                                            document.getElementById('btn-tidak').style.display = 'none';
                                        } else {
                                            document.getElementById('btn-ya').style.display = 'none';
                                        }

                                        // Panggil fungsi yang kamu butuhkan
                                        setHPAda(isYes);
                                    }

                                    function setHPAda(value) {
                                        console.log("Pilihan:", value ? "Ya" : "Tidak");
                                        // Logika lainnya sesuai kebutuhanmu
                                    }
                                </script>


                                <input style="border: none; border-radius: 10px; padding: 10px; color: black;"
                                    type="date" name="tanggal">
                                <select id="layananSelect" name="nama_layanan" onchange="filterWaktu()"
                                    style="border: none; border-radius: 10px; padding: 10px; color: black;">
                                    <option value="" disabled selected>-- Pilih Layanan --</option>
                                    @foreach ($prices->unique('nama_layanans') as $layanan)
                                        @if ($layanan->layananlaundry->kategori === 'kiloan')
                                            <option value="{{ $layanan->nama_layanans }}">
                                                {{ $layanan->nama_layanans }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>

                                <select id="waktuSelect" name="waktu"
                                    style="border: none; border-radius: 10px; padding: 10px; color: black;">
                                    <option value="" disabled selected>-- Pilih Waktu --</option>
                                    @foreach ($prices as $layanan)
                                        @if ($layanan->layananlaundry->kategori === 'kiloan')
                                            <option value="{{ $layanan->waktu }}" data-harga="{{ $layanan->harga }}"
                                                data-layanan="{{ $layanan->nama_layanans }}">

                                            </option>
                                        @endif
                                    @endforeach

                                </select>

                                {{-- <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const nomorHpInput = document.getElementById('nomor_hp');
                                        const namaPelangganInput = document.getElementById('nama_pelanggan');

                                        const pelangganList =
                                            @json($pelanggan); // contoh: [{ "nomor_hp": "08123456789", "nama": "Andi" }, ...]

                                        nomorHpInput.addEventListener('input', function() {
                                            const nomor = nomorHpInput.value.trim();

                                            const found = pelangganList.find(p => p.nomor_hp === nomor);

                                            if (found) {
                                                namaPelangganInput.value = found.nama;
                                            } else {
                                                namaPelangganInput.value = '';
                                            }
                                        });
                                    });
                                </script> --}}

                                <script>
                                    const dataListHarga = @json($prices);
                                    const pelangganList = @json($transaksis);
                                </script>
                                <script>
                                    function filterWaktu() {
                                        const selectedLayanan = document.getElementById('layananSelect').value;
                                        const waktuSelect = document.getElementById('waktuSelect');

                                        // Kosongkan dropdown waktu dulu
                                        waktuSelect.innerHTML = '<option disabled selected>-- Pilih Waktu --</option>';

                                        // Filter berdasarkan nama layanan yang sama
                                        const filtered = dataListHarga.filter(item => item.nama_layanans === selectedLayanan);

                                        // Isi opsi waktu
                                        filtered.forEach(item => {
                                            const option = document.createElement('option');
                                            option.value = item.waktu;
                                            option.text = item.waktu;
                                            waktuSelect.appendChild(option);
                                        });
                                    }
                                </script>

                                <div
                                    style="display: flex; align-items: center; border-radius: 10px; overflow: hidden; background: white;">
                                    <input id="berat" style="border: none; padding: 10px; color: black; flex: 1;"
                                        placeholder="Berat" type="number" name="berat">
                                    <span style="padding: 10px; background-color: #b11050; color: black;">Kg</span>
                                </div>

                                <input style="border: none; border-radius: 10px; padding: 10px; color: black;"
                                    placeholder="Estimasi" type="date" name="estimasi">
                                <input style="border: none; border-radius: 10px; padding: 10px; color: black;"
                                    placeholder="Total Bayar" type="text" name="total_bayar" readonly>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Ambil data harga dari server
                                        const dataListHarga = @json($prices);
                                        const datapelanggan = @json($pelanggan);
                                        const beratInput = document.getElementById('berat');
                                        const layananSelect = document.getElementById('layananSelect');
                                        const waktuSelect = document.getElementById('waktuSelect');
                                        const nomor_hp = document.getElementById('nomor_hp');
                                        const totalBayarInput = document.querySelector('input[name="total_bayar"]');
                                        // const nama_pelangganInput = document.querySelector('input[name="nama_pelanggan"]');
                                        // const matched1 = datapelanggan.find(p =>
                                        //         p.nomor_hp === nomor_hp
                                        //     );
                                        // nama_pelangganInput = matched1.nama_pelanggan;



                                        function hitungTotalBayar() {
                                            const berat = parseFloat(beratInput.value);
                                            const selectedLayanan = layananSelect.value;
                                            const selectedWaktu = waktuSelect.value;

                                            // Cari data harga berdasarkan layanan dan waktu
                                            const matched = dataListHarga.find(item =>
                                                item.nama_layanans === selectedLayanan &&
                                                item.waktu === selectedWaktu
                                            );

                                            if (matched) {
                                                const harga = parseFloat(matched.harga);
                                                if (!isNaN(berat) && !isNaN(harga)) {
                                                    const total = berat * harga;
                                                    totalBayarInput.value = total.toLocaleString('id-ID');
                                                } else {
                                                    totalBayarInput.value = harga.toLocaleString('id-ID');
                                                }
                                            } else {
                                                totalBayarInput.value = '';
                                            }
                                        }

                                        // Trigger hitung ulang jika inputan berubah
                                        beratInput.addEventListener('input', hitungTotalBayar);
                                        layananSelect.addEventListener('change', hitungTotalBayar);
                                        waktuSelect.addEventListener('change', hitungTotalBayar);
                                    });
                                </script>




                                <button type="submit"
                                    style="margin-top: 20px; width: 100%; padding: 10px; border: none; border-radius: 10px; background-color: #b11050; color: white; font-weight: bold; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                                    TAMBAHKAN
                                </button>

                                <!-- Tombol Close -->
                                <button onclick="closeModalKilo()"
                                    style="position: absolute; top: 10px; right: 15px; background: transparent; border: none; color: white; font-size: 20px; cursor: pointer;">&times;</button>
                            </div>
                        </form>

                        <script>
                            function setHPAda(status) {
                                document.getElementById('hp_sudah_ada').value = status ? 1 : 0;
                            }
                        </script>

                        <!-- Nama -->
                        {{-- <div style="display: flex; flex-direction: column; gap: 12px;   ">

                            <input type="text" placeholder="Nama" name="nama_pelanggan"
                                style="flex: 1; border: none; border-radius: 10px; padding: 10px; color: black;">
                        </div>

                        <!-- Pertanyaan -->
                        <p style="text-align: center; font-size: 14px; color: white;">Apakah nama telah ada sebelumnya ?
                        </p>
                        <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                            <button
                                style="background-color: #b11050; border: none; border-radius: 6px; padding: 8px 14px; color: white; font-weight: bold;">✔
                                Ya</button>
                            <button
                                style="background-color: #b11050; border: none; border-radius: 6px; padding: 8px 14px; color: white; font-weight: bold;">✘
                                Tidak</button>
                        </div>

                        <!-- Form Input -->
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <input type="text" placeholder="No. HP"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                            <input type="date" placeholder="Tanggal"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                            <input type="text" placeholder="Layanan"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                            <input type="text" placeholder="Berat"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                            <input type="text" placeholder="Estimasi"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                            <input type="text" placeholder="Total Bayar"
                                style="border: none; border-radius: 10px; padding: 10px; color: black;">
                        </div>

                        <!-- Tombol Tambahkan -->
                        <button
                            style="margin-top: 20px; width: 100%; padding: 10px; border: none; border-radius: 10px; background-color: #b11050; color: white; font-weight: bold; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                            TAMBAHKAN
                        </button>

                        <!-- Tombol Close -->
                        <button onclick="closeModalKilo()"
                            style="position: absolute; top: 10px; right: 15px; background: transparent; border: none; color: white; font-size: 20px; cursor: pointer;">&times;</button>
                            --}}
                    </div>
                </div>
            </div>
        </div>

        <script>
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
