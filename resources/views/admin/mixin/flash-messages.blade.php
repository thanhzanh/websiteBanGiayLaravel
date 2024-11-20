@vite('resources/css/app.css')

@if(session('success'))
<div class="alert alert-success text-center bg-green-500 font-bold " role="alert">
    {{ session('success') }}
</div>
@endif
      
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show text-center bg-red-400 font-bold text-white text-xl pt-1 pb-1 " role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
       

