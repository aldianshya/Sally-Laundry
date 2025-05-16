<header id="header" class="header d-flex align-items-center fixed-top bg-white">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <img src="asset/logo_laundry.png" alt="Sally Laundry" class="img-fluid" style="max-height: 50px; margin-bottom: 0;">
    </a>

    <nav id="navmenu" class="navmenu ms-auto">
  <ul class="d-flex">
    <li><a href="#hero" class="active">Beranda</a></li>
    <li><a href="#about">Layanan</a></li>
    <li><a href="#services">List Harga</a></li>
    <li><a href="#portfolio">Kontak</a></li>
    <li><a href="#pricing">Rekapitulasi</a></li>
    <li>
  <div class="ms-3">
    @auth
      <!-- Jika sudah login -->
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn d-flex justify-content-center align-items-center text-center" style="background-color: #F7B2C6; border: none; color: black; width: 100px;">
          Logout
        </button>
      </form>
    @else
      <!-- Jika belum login --> 
      <a href="{{ route('login') }}" class="btn d-flex justify-content-center align-items-center text-center" style="background-color: #F7B2C6; border: none; color: black; width: 100px;">
        Login
      </a>
    @endauth
  </div>
</li>


  </ul>

  

  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>


    <!-- Hapus bagian tombol Get Started -->
    <!-- <a class="btn-getstarted" href="#about">Get Started</a> -->

  </div>
</header>