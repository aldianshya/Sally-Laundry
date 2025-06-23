<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'LaundryApp')</title>
    <meta name="description" content="">
    <meta name="keywords" content="laundry, aplikasi laundry, bersih, cepat">

    <!-- Favicons -->
    <link href="{{ asset('asset/logo_laundry.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery & Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Main CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    @include('layout.style')
    {{-- @include('layout.style2') --}}

    <!-- Custom Styles -->
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
        a {
            text-decoration: none;
        }

        .paket-title {
            background-color: #c11244;
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-align: center;
            font-weight: bold;
            font-style: italic;
            text-transform: uppercase;
            display: inline-block;
            box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
            font-size: 1.2rem;
        }

        .btn-pilih {
            background-color: #b11050;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
            color: white;
            font-weight: bold;
            transition: 0.2s;
            cursor: pointer;
        }

        .btn-pilih.active {
            background-color: white;
            color: #b11050;
            border: 2px solid #b11050;
        }

        .form-wrapper {
            background-color: #f8b8c7;
            padding: 2rem;
            border-radius: 1rem;
        }

        .input-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .input-label {
            width: 100px;
            margin-right: 10px;
            font-weight: 500;
            background-color: white;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .input-field input {
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
    <style>


    .filter-wrapper {
      position: relative;
      display: inline-block;
    }

    .filter-btn {
      background-color: transparent;
      border: none;
      cursor: pointer;
    }

    .filter-icon {
      width: 0;
      height: 0;
      border-left: 12px solid transparent;
      border-right: 12px solid transparent;
      border-bottom: 15px solid #e15a84;
    }

    .dropdown {
      display: none;
      position: absolute;
      top: 25px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #e15a84;
      color: white;
      padding: 10px 20px;
      border-radius: 0 0 10px 10px;
      z-index: 100;
      width: 120px;
    }

    .dropdown.show {
      display: block;
    }

    .dropdown-option {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .dropdown-option:last-child {
      margin-bottom: 0;
    }

    .circle {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background-color: white;
      margin-right: 10px;
    }

    .circle.active {
      background-color: #7c2a41;
    }
  </style>
</head>

