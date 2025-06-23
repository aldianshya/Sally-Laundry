<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Tambahkan jQuery dan Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Modal Tambah Daftar Harga -->
<div class="modal fade" id="form2Modal" tabindex="-1" aria-labelledby="form2ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
            <div class="modal-body text-center p-4">
                <h5 class="modal-title mb-4 text-white fw-bold" id="form2ModalLabel">Tambah Daftar Harga</h5>

                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-pill text-center shadow-sm"
                            placeholder="Nama Layanan" name="nama_layanan" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success fw-bold rounded-pill px-4">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- JavaScript Dinamis untuk Input Harga & Waktu -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('namaLayananSelectEdit2');
        const hargaInput = document.getElementById('inputHarga');
        const waktuInput = document.getElementById('inputWaktu');

        function toggleInputs() {
            const selectedValue = select.value.toLowerCase();
            const jenis = selectedOption.getAttribute('data-jenis');

            Sembunyikan dulu semua input
            hargaInput.classList.add('d-none');
            waktuInput.classList.add('d-none');

            // Tampilkan berdasarkan isi value
            if (jenis === 'PAKET LAUNDRY KILOAN') {
                hargaInput.classList.remove('d-none');
            } else if (selectedValue.includes('jam')) {
                hargaInput.classList.remove('d-none');
                waktuInput.classList.remove('d-none');
            }
        }


        select.addEventListener('change', toggleInputs);
        toggleInputs();
    });
</script>

<!-- Aktifkan Select2 -->
<script>
    $(document).ready(function() {
        $('#namaLayananSelectEdit').select2({
            tags: true,
            placeholder: "Pilih atau ketik layanan...",
            allowClear: true,
            dropdownParent: $('#formModal'),
            width: '100%'
        });

        $('#namaLayananSelectEdit2').select2({
            tags: true,
            placeholder: "Pilih atau ketik layanan...",
            allowClear: true,
            dropdownParent: $('#formModal'),
            width: '100%'
        });
    });
</script>
