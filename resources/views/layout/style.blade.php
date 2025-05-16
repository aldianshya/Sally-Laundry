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
  }
  </style>  