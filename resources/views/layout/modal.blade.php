
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">UBAH DAFTAR HARGA</h5>

                        <form action="{{ route('list-harga.update') }}" method="POST">
                            @csrf

                            <!-- Pilih Layanan Laundry -->
                            <div class="mb-3">
                                <select name="layanan_laundry_id"
                                    class="form-control rounded-pill text-center shadow-sm" required>
                                    <option value="" disabled selected>Pilih Layanan</option>
                                    @foreach($layananLaundryList as $layanan)
                                        @if($layanan->kategori === 'Kiloan')
                                            <option value="{{ $layanan->id }}">{{ $layanan->nama_layanan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Waktu & Harga -->
                            <div class="d-flex justify-content-between gap-2 mb-3">
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Waktu" name="waktu" required>
                                <input type="number" min="0" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Harga" name="harga" required>
                            </div>

                            <!-- ID tersembunyi untuk edit/hapus -->
                            <input type="hidden" name="id" value="">

                            <!-- Tombol: TAMBAH + EDIT -->
                            <div class="d-flex justify-content-center gap-5 mb-3">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060;">TAMBAH</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal layanan -->
        <div class="modal fade" id="form2Modal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">Tambah Daftar Harga</h5>

                        <form action="{{ route('layanan.store') }}" method="POST">
                            @csrf

                            <!-- Nama Layanan -->
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Nama Layanan" name="nama_layanan" required>
                            </div>

                            <!-- Layanan -->
                            <div class="mb-3">
                                <select name="kategori" class="form-select rounded-pill text-center shadow-sm" required>
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="Satuan">Satuan</option>
                                    <option value="Kiloan">Kiloan</option>
                                </select>
                            </div>


                            <!-- Tombol Tambah -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success fw-bold rounded-pill px-4">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Konfirmasi Hapus -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('list-harga.update') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
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
        <!-- Modal -->

        <!-- tes-->
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4" style="background-color: #f8bfcf; border: none;">
                    <div class="modal-body text-center p-4">
                        <h5 class="modal-title mb-4 text-white fw-bold" id="formModalLabel">UBAH DAFTAR HARGA</h5>

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