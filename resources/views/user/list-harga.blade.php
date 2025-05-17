<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>List Harga - Sally Laundry</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    @include('layout.style')

    <!-- Favicons -->
    <link href="asset/laundry.jpeg" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        .title-container {
            position: relative;
            text-align: center;
        }

        .title-container .action-button {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>

    <!-- =======================================================
  * Template Name: Invent
  * Template URL: https://bootstrapmade.com/invent-bootstrap-business-template/
  * Updated: May 12 2025 with Bootstrap v5.3.6
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">

    <!-- header -->
    @include('layout.header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="title-container my-1">
                        <h1 class="heading-title">Daftar Harga</h1>
                        <button class="action-button" data-bs-toggle="modal" data-bs-target="#formModal"
                            style="padding: 0; width: 40px; height: 40px; border: none; outline: none;">
                            <img src="asset/pensil.png" alt="Edit"
                                style="width: 100%; height: 100%; object-fit: contain;">
                        </button>


                        <h3 class="mt-1">Paket Laundry Satuan</h3>

                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="p-4 rounded shadow" style="background-color: #E6618B; color: white;">
                                <h5 class="fw-bold fst-italic" style="color: white;">Cuci & Setrika</h5>
                                <ul class="text-start mt-3" style="color: black;">
                                    <li>6 jam Rp 12.000</li>
                                    <li>2 hari Rp 6.000</li>
                                    <li>1 hari Rp 7.000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 rounded shadow" style="background-color: #E6618B; color: white;">
                                <h5 class="fw-bold fst-italic" style="color: white;">Cuci Lipat Rapi</h5>
                                <ul class="text-start mt-3" style="color: black;">
                                    <li>3 jam Rp 7.000</li>
                                    <li>2 hari Rp 4.000</li>
                                    <li>1 hari Rp 5.000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 rounded shadow" style="background-color: #E6618B; color: white;">
                                <h5 class="fw-bold fst-italic" style="color: white;">Setrika Wangi</h5>
                                <ul class="text-start mt-3" style="color: black;">
                                    <li>3 jam Rp 10.000</li>
                                    <li>2 hari Rp 4.000</li>
                                    <li>1 hari Rp 5.000</li>
                                </ul>
                            </div>
                        </div>
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
                <div class="col-md-4 mb-3">
                    <div class="p-4 rounded shadow" style="background-color: #E6618B; color: white;">
                        <ul class="text-start mt-3" style="color: black;">
                            <li><strong>6 jam Rp 12.000</strong></li>
                            <li><strong>2 hari Rp 6.000</strong></li>
                            <li><strong>1 hari Rp 7.000</strong></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer2')

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

                        <form action="/ubah-harga" method="POST">
                            <!-- Layanan -->
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Layanan" name="layanan" required>
                            </div>

                            <!-- Waktu & Harga -->
                            <div class="d-flex justify-content-between gap-2 mb-3">
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Waktu" name="waktu" required>
                                <input type="text" class="form-control rounded-pill text-center shadow-sm"
                                    placeholder="Harga" name="harga" required>
                            </div>

                            <!-- Tombol: TAMBAH + EDIT -->
                            <div class="d-flex justify-content-center gap-5 mb-3">
                                <button type="submit" name="aksi" value="tambah"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #008060; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">TAMBAH</button>
                                <button type="submit" name="aksi" value="edit"
                                    class="btn text-white fw-bold rounded-pill px-4"
                                    style="background-color: #832f42; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">EDIT</button>
                            </div>

                            <!-- Tombol: HAPUS -->
                            <div class="d-grid">
                                <button type="submit" name="aksi" value="hapus"
                                    class="btn text-white fw-bold rounded-pill"
                                    style="background-color: #b00020; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>