<header id="header" class="header d-flex align-items-center fixed-top bg-white">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <img src="asset/logo_laundry.png" alt="Sally Laundry" class="img-fluid" style="max-height: 50px; margin-bottom: 0;">
    </a>

    <nav id="navmenu" class="navmenu ms-auto">
  <ul class="d-flex">
    <li>
  <a href="{{ route('dashboard') }}" 
     class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
    Beranda
  </a>
</li>
<li>
  <a href="{{ route('list-harga') }}" 
     class="{{ request()->routeIs('list-harga') ? 'active' : '' }}">
    List Harga
  </a>
</li>
<li>
  <a href="#" 
     class="">
    Rekapitulasi
  </a>
</li>

    <li>
  <div class="ms-3 d-flex align-items-center">
    @auth
      <!-- Tampilkan nama admin dengan huruf tebal -->
      <span class="me-2 fw-bold">Hai, {{ Auth::user()->name }}</span>

      <!-- Tombol Logout -->
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn d-flex justify-content-center align-items-center text-center" style="background-color: #F7B2C6; border: none; color: black; width: 100px;">
          Logout
        </button>
      </form>
    @else
    <div class="d-inline">
  <!-- Jika belum login -->
  <a href="{{ route('login') }}" 
     class="btn text-center" 
     style="background-color: #F7B2C6; border: none; color: black; width: 100px; padding: 8px 0; display: inline-block;">
    Login
  </a>
</div>

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