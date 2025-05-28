<!-- Halamana Dashboard -->
<!-- Footer -->
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('mobile-nav-toggle');
    const navLinks = document.getElementById('navbar-links');

    toggleBtn.addEventListener('click', function() {
      navLinks.classList.toggle('show');
    });

    // Reset navbar when resizing window
    function handleResize() {
      if(window.innerWidth >= 1200) {
        navLinks.classList.remove('show');
      }
    }
    window.addEventListener('resize', handleResize);
    window.addEventListener('load', handleResize);
  </script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>
<!-- @include('layout.footer')  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toast = document.getElementById('toast-alert');
    if (toast) {
        setTimeout(() => {
            toast.style.animation = 'fadeOut 0.5s forwards';
        }, 100000); // Muncul selama 3 detik
        setTimeout(() => {
            toast.remove();
        }, 10500); // Hapus dari DOM setelah animasi selesai
    }
</script>

<!-- Halaman List Harga -->
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            background: '#f8bfcf',
            color: '#832f42',
            customClass: {
                popup: 'rounded-4 shadow'
            }
        });
    @endif
</script>
<script>
    const deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const inputId = deleteModal.querySelector('#delete-id');
        inputId.value = id;
    });
</script>
<script>
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Ambil data dari tombol
        const id = button.getAttribute('data-id');
        const layanan = button.getAttribute('data-layanan');
        const waktu = button.getAttribute('data-waktu');
        const harga = button.getAttribute('data-harga');

        // Isi form modal dengan data lama
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-layanan').value = layanan;
        document.getElementById('edit-waktu').value = waktu;
        document.getElementById('edit-harga').value = harga;
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.mobile-nav-toggle');
    const navmenu = document.querySelector('.navmenu');

    toggle.addEventListener('click', function() {
      navmenu.classList.toggle('active');
    });
  });
</script>
