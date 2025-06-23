<style>
    .custom-toast {
      position: fixed;
      top: 20%;
      left: 50%;
      transform: translateX(-50%);
      min-width: 300px;
      z-index: 9999;
      padding: 1rem 1.5rem;
      border-radius: 10px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.2);
      animation: fadeIn 0.5s ease-in-out;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1rem;
    }
  
    .toast-success {
      background-color: #d4edda;
      color: #155724;
    }
  
    .toast-error {
      background-color: #f8d7da;
      color: #721c24;
    }
  
    .icon {
      font-size: 1.5rem;
    }
  
    @keyframes fadeIn {
      from { opacity: 0; transform: translate(-50%, -20%); }
      to { opacity: 1; transform: translate(-50%, 0); }
    }
  
    @keyframes fadeOut {
      from { opacity: 1; transform: translate(-50%, 0); }
      to { opacity: 0; transform: translate(-50%, -20%); }
    }
    body {
    font-family: 'Nunito', sans-serif !important;
    width: 100%;
  }
  .btn-edit:hover {
        background-color: #ffc107 !important; /* kuning */
        color: white !important;
        border-radius: 4px;
    }

    /* Hover khusus untuk tombol hapus */
    .btn-hapus:hover {
        background-color: #dc3545 !important; /* merah */
        color: white !important;
        border-radius: 4px;
    }

    /* Ikon di dalam tombol */
    .btn-sm i {
        font-size: 0.8rem;
        padding: 4px;
    }
  </style>  
  <style>
   /* Default desktop: nav-list horizontal */
.nav-list {
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-list li {
  margin-left: 20px;
}

.nav-list li:first-child {
  margin-left: 0;
}

/* Mobile styles */
@media (max-width: 1199px) {
  /* Sembunyikan menu default dulu */
  .nav-list {
    flex-direction: column !important;
    display: none; /* awalnya sembunyi */
    background: white;
    position: absolute;
    top: 60px; /* sesuaikan dengan header height */
    right: 0;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    z-index: 999;
  }

  .nav-list li {
    margin: 0;
    border-bottom: 1px solid #ddd;
  }

  .nav-list li {
    padding: 15px 20px;
    display: block;
    width: 100%;
    text-decoration: none;
  }
a {
text-decoration: none;
}
  /* Jika menu aktif ditampilkan */
  .navmenu.active .nav-list {
    display: flex;
  }

  /* Toggle icon style */
  .mobile-nav-toggle {
    font-size: 1.8rem;
    cursor: pointer;
  }
}
.card {
      background-color: #f5afcb;
      padding: 20px;
      border-radius: 15px;
      width: 300px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .card ul {
      padding-left: 20px;
    }

    .card li {
      margin-bottom: 8px;
    }
.section-title1 {
      background-color: #b30059;
      color: white;
      padding: 10px 20px;
      display: inline-block;
      border-radius: 20px;
      margin: 30px auto 10px;
      font-weight: bold;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 10px;
    }
  </style>
  