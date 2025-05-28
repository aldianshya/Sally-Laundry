@if(session('success'))
<div class="custom-toast toast-success" id="toast-alert">
  <span class="icon">✔️</span>
  <div>{{ session('success') }}</div>
</div>
@endif

@if(session('error'))
<div class="custom-toast toast-error" id="toast-alert">
  <span class="icon">❌</span>
  <div>{{ session('error') }}</div>
</div>
@endif

@if ($errors->any())
<div class="custom-toast toast-error" id="toast-alert">
  <span class="icon">❌</span>
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif