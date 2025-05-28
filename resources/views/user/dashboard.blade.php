@include('layout.head')

<body class="index-page">
  @include('layout.pesan')

  <!-- header -->
  @include('layout.header')

  <main class="main">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section" style="text-color:rgb(255, 255, 255); background-color: #F7B2C6; ">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center mb-5">
          <div class="col-lg-6 mb-4 mb-lg-0 text-center" style="color:rgb(255, 255, 255);">

            <p class="hero-title mb-4" style="color: white">Laundry Praktis, Usaha Otomatis!</p>

            <p class="hero-description mb-4" style="color: white">Solusi Laundry Hemat dan Ekonomis</p>
          </div>

          <div class="col-lg-6">
            <div class="hero-image text-center">
              <img src="asset/atas1.png" alt="Business Growth" class="img-fluid" loading="lazy"
                style="max-height: 300px; max-width: 300px;">
              <img src="asset/atas2.png" alt="Business Growth" class="img-fluid" loading="lazy"
                style="max-height: 300px; max-width: 300px;">
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Call To Action 2 Section -->
    <section id="about" class="call-to-action-2 section light-background"
      style="text-color:rgb(255, 255, 255); background-color:rgb(255, 255, 255); ">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="">
              <img src="asset/laundry.jpeg" alt="Call to Action" class="img-fluid rounded-4">
              <div class="cta-pattern"></div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="cta-content">
              <h2 style="color: #e6698f">Profil Sally Laundry</h2>
              <p class="lead">Sally Laundry adalah adalah layanan laundry kiloan dan satuan. Kami adalah tim profesional
                yang selalu mengutamakan kualitas cucian & pelayanan dengan prinsip bersih, rapi, wangi, dan tepat
                waktu.</p>
              <p class="lead">Sally Laundry menerima laundry kiloan untuk perusahaan, misal kantor, rumah sakit, asrama,
                pesantren, sekolah, perusahaan konveksi atau perusahaan-perusahaan semisal. silakan hubungi kami untuk
                penawaran harga khususnya.</p>

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
      <div class="container section-title" data-aos="fade-up">
        <h2 style="color: #e6698f">Layanan Sally Laundry </h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">
              <div class="portfolio-card" style="text-color:rgb(255, 255, 255); background-color: #e6698f; ">
                <div class="portfolio">
                  <div class="text-center">
                    <img src="asset/cuci_lipat.png" class="img-fluid" alt="" loading="lazy" style="max-height: 300px;">
                  </div>

                  <div class="portfolio-overlay">
                    <div class="portfolio-actions">
                      <a href="assets/img/portfolio/portfolio-1.webp" class="glightbox preview-link"
                        data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                      <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="portfolio-content" style="text-align: center;">
                  <!-- <span class="category">Web Design</span> -->
                  <h3>Cuci Lipat</h3>
                  <!-- <p>Maecenas faucibus mollis interdum sed posuere consectetur est at lobortis.</p> -->
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-graphics">
              <div class="portfolio-card" style="text-color:rgb(255, 255, 255); background-color: #e6698f; ">
                <div class="portfolio">
                  <div class="text-center">
                    <img src="asset/cuci_setrika.png" class="img-fluid" alt="" loading="lazy"
                      style="max-height: 300px;">
                  </div>
                  <div class="portfolio-overlay">
                    <div class="portfolio-actions">
                      <a href="assets/img/portfolio/portfolio-10.webp" class="glightbox preview-link"
                        data-gallery="portfolio-gallery-graphics"><i class="bi bi-eye"></i></a>
                      <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="portfolio-content" style="text-align: center;">
                  <!-- <span class="category">Graphics</span> -->
                  <h3>Cuci Setrika</h3>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-motion">
              <div class="portfolio-card" style="text-color:rgb(255, 255, 255); background-color: #e6698f; ">
                <div class="portfolio">
                  <div class="text-center">
                    <img src="asset/wangi.png" class="img-fluid" alt="" loading="lazy" style="max-height: 300px;">
                  </div>
                  <div class="portfolio-overlay">
                    <div class="portfolio-actions">
                      <a href="assets/img/portfolio/portfolio-7.webp" class="glightbox preview-link"
                        data-gallery="portfolio-gallery-motion"><i class="bi bi-eye"></i></a>
                      <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="portfolio-content" style="text-align: center;">
                  <!-- <span class="category">Motion</span> -->
                  <h3>Setrika Wangi</h3>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-brand">
              <div class="portfolio-card" style="text-color:rgb(255, 255, 255); background-color: #e6698f; ">

                <div class="portfolio">
                  <div class="text-center">
                    <img src="asset/satuan.png" class="img-fluid" alt="" loading="lazy" style="max-height: 300px;">
                  </div>
                  <div class="portfolio-overlay">
                    <div class="portfolio-actions">
                      <a href="assets/img/portfolio/portfolio-4.webp" class="glightbox preview-link"
                        data-gallery="portfolio-gallery-brand"><i class="bi bi-eye"></i></a>
                      <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="portfolio-content" style="text-align: center;">
                  <!-- <span class="category">Branding</span> -->
                  <h3>Laundry Satuan</h3>
                </div>
              </div>
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