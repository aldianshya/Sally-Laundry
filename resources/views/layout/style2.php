<style>
body {
  background-image: url('asset/laundry.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  font-family: 'Nunito', sans-serif;
  position: relative;
  color: #fff;
  /* HAPUS opacity: 10px; karena itu salah */
  filter: brightness(1.1) contrast(1.2) saturate(1.3);
}

/* Overlay gelap sebagai peredup */
body::before {
  content: "";
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0, 0, 0, 0.4); /* 0.4 = opacity overlay, bisa kamu ubah */
  z-index: 0;
}

.container {
  position: relative;
  z-index: 1;
}


form {
  background-color: rgba(232, 106, 143, 0.5);
  padding: 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  color: #fff;
}

    button.btn {
      background-color: #C11648;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 0.75rem;
      border-radius: 0.75rem;
      border: none;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 10px rgba(193, 22, 72, 0.7);
    }
    button.btn:hover {
      background-color: #910a35;
      box-shadow: 0 6px 15px rgba(145, 10, 53, 0.9);
    }
    a.text-white {
      text-decoration: underline;
      font-weight: 700;
      color: #fff;
    }
    a.text-white:hover {
      color: #f0a1b3;
      text-decoration: none;
    }
    .text-center h5 {
      margin-bottom: 1.5rem;
      font-weight: 600;
      text-shadow: 0 1px 5px rgba(0,0,0,0.7);
    }
    img.img-fluid {
      max-height: 100px;
      margin-bottom: 1rem;
      filter: drop-shadow(0 2px 2px rgba(0,0,0,0.5));
    }
  </style>