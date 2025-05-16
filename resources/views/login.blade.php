<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Login - Sally Laundry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />

  @include('layout.style') 
  @include('layout.style2') 


</head>
<body>
  @include('layout.pesan') 

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100" style="max-width: 400px;">
      <div class="text-center">
        <img src="asset/logo_laundry.png" alt="Sally Laundry" class="img-fluid" style="box-shadow: inset;"/>
        <h5>Selamat Datang di Sally Laundry, Silahkan Masuk Terlebih Dahulu!</h5>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <input type="text" name="no_hp" class="form-control" placeholder="No. Handphone" required />
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required />
          </div>
          <button type="submit" class="btn w-100">MASUK</button>
          <p class="mt-3 text-center">
            Belum memiliki Akun? <a href="{{ route('register') }}" class="text-white">Daftar</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <!-- @include('layout.footer')  -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toast = document.getElementById('toast-alert');
    if (toast) {
      setTimeout(() => {
        toast.style.animation = 'fadeOut 0.5s forwards';
      }, 3000);
      setTimeout(() => {
        toast.remove();
      }, 3500);
    }
  </script>
</body>
</html>
