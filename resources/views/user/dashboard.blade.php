@include('layout.head')

<body class="index-page">
    @include('layout.pesan')

    <!-- header -->
    @include('layout.header')

    <main class="main">

        <!-- Hero Section -->
        <!-- Hero Section -->
        <section id="hero" class="hero section" style="text-color:rgb(255, 255, 255); background-color: #F7B2C6; ">
            <div class="container1" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 mb-4 mb-lg-0 text-center" style="color:rgb(255, 255, 255);">

                        {{-- <p class="hero-title mb-4" style="color: white">Laundry Praktis, Usaha Otomatis!</p>

            <p class="hero-description mb-4" style="color: white">Solusi Laundry Hemat dan Ekonomis</p> --}}
                        <p class="hero-title mb-4" style="color: white">
                            {{ $profil->judul_slogan ?? 'Laundry Praktis, Usaha Otomatis!' }}</p>
                        <p class="hero-description mb-4" style="color: white">
                            {{ $profil->subjudul_slogan ?? 'Solusi Laundry Hemat dan Ekonomis' }}</p>

                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image text-center">
                            {{-- <img src="asset/atas1.png" alt="Business Growth" class="img-fluid" loading="lazy"
                style="max-height: 300px; max-width: 300px;">
              <img src="asset/atas2.png" alt="Business Growth" class="img-fluid" loading="lazy"
                style="max-height: 300px; max-width: 300px;"> --}}
                            @if ($profil->gambar_ilustrasi)
                                <img src="{{ asset('storage/' . $profil->gambar_ilustrasi) }}" alt="Ilustrasi"
                                    class="img-fluid" loading="lazy"
                style="max-height: 300px; max-width: 300px;">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Call To Action 2 Section -->
        <section id="about" class="call-to-action-2 section light-background"
            style="text-color:rgb(255, 255, 255); background-color:rgb(255, 255, 255); ">

            <div class="container1" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="">
                            {{-- <img src="asset/laundry.jpeg" alt="Call to Action" class="img-fluid rounded-4"> --}}
                            @if ($profil->gambar_profil)
                                <img src="{{ asset('storage/' . $profil->gambar_profil) }}" alt="Gambar Profil"
                                    class="img-fluid rounded-4">
                            @endif

                            <div class="cta-pattern"></div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="cta-content">
                            {{-- <h2 style="color: #e6698f">Profil Sally Laundry</h2>
              <p class="lead">Sally Laundry adalah adalah layanan laundry kiloan dan satuan. Kami adalah tim profesional
                yang selalu mengutamakan kualitas cucian & pelayanan dengan prinsip bersih, rapi, wangi, dan tepat
                waktu.</p>
              <p class="lead">Sally Laundry menerima laundry kiloan untuk perusahaan, misal kantor, rumah sakit, asrama,
                pesantren, sekolah, perusahaan konveksi atau perusahaan-perusahaan semisal. silakan hubungi kami untuk
                penawaran harga khususnya.</p> --}}
                            <h2 style="color: #e6698f">{{ $profil->nama_usaha ?? 'Sally Laundry' }}</h2>
                            <p class="lead">{{ $profil->deskripsi_profil ?? 'Deskripsi usaha belum ditambahkan.' }}
                            </p>
                            @if (!empty($profil->catatan_tambahan))
                                <p class="lead">{{ $profil->catatan_tambahan }}</p>
                            @endif

                            <div class="cta-features">
                                <div class="feature-item" data-aos="zoom-in" data-aos-delay="400">
                                    <span style="color: #e6698f">Laundry Bersih, Wangi, dan Tepat Waktu !</span>
                                </div>
                            </div>
                            <!-- <div class="cta-action mt-5">
                <a href="#" class="btn btn-primary btn-lg me-3">Get Started</a>
                <a href="#" class="btn btn-outline-primary btn-lg">Learn More</a>
              </div> -->
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action 2 Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container1 section-title" data-aos="fade-up">
                <h2 style="color: #e6698f">Layanan Sally Laundry </h2>
            </div><!-- End Section Title -->

            <div class="container" style="max-width: 50%;" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3 isotope-container justify-content-between" data-aos="fade-up" data-aos-delay="300">

                    <!-- Item 1 -->
                    <div class="col-6 portfolio-item isotope-item">
                        <div class="portfolio-card text-white text-center rounded"
                            style="background-color: #e6698f; border: 1px solid #fff; padding: 10px;">
                            <img src="asset/cuci_lipat.png" alt="Cuci Lipat" class="img-fluid mb-1"
                                style="max-height: 100px;">
                            <small>Cuci Lipat</small>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-6 portfolio-item isotope-item">
                        <div class="portfolio-card text-white text-center rounded"
                            style="background-color: #e6698f; border: 1px solid #fff; padding: 10px;">
                            <img src="asset/cuci_setrika.png" alt="Cuci Setrika" class="img-fluid mb-1"
                                style="max-height: 100px;">
                            <small>Cuci Setrika</small>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-6 portfolio-item isotope-item">
                        <div class="portfolio-card text-white text-center rounded"
                            style="background-color: #e6698f; border: 1px solid #fff; padding: 10px;">
                            <img src="asset/wangi.png" alt="Setrika Wangi" class="img-fluid mb-1"
                                style="max-height: 100px;">
                            <small>Setrika Wangi</small>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-6 portfolio-item isotope-item">
                        <div class="portfolio-card text-white text-center rounded"
                            style="background-color: #e6698f; border: 1px solid #fff; padding: 10px;">
                            <img src="asset/satuan.png" alt="Laundry Satuan" class="img-fluid mb-1"
                                style="max-height: 100px;">
                            <small>Laundry Satuan</small>
                        </div>
                    </div>

                </div>
            </div>


        </section><!-- /Portfolio Section -->

    </main>

    @include('layout.footer2')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    @include('layout.script')
</body>

</html>
