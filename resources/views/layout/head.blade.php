<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Default Title</title> <!-- Title default -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    @include('layout.style')
    
    <!-- Favicons -->
    <link href="asset/logo_laundry.png" rel="icon">

    <!-- Fonts -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<head>
  <!-- Link Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- CSS Bootstrap jika pakai -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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
</head>

<body>

    <div class="title-container">
        <h1>List Harga Laundry</h1>
        <button class="action-button btn btn-primary">Action</button>
    </div>

    <!-- Konten lainnya disini -->

    <script>
        // Cek path URL saat ini
        if (window.location.pathname === '/list-harga') {
            document.title = 'List Harga - Sally Laundry';
        } else if (window.location.pathname === '/dashboard') {
            document.title = 'Halaman Utama - Sally Laundry';
        } else {
            document.title = 'Sally Laundry';
        }
    </script>

</body>

</html>
