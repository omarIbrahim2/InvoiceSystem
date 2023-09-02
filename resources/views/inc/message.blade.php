@if (session()->has('success'))
<div class="bg-success w-25 text-center position-relative msg">
    <span class="position-absolute msg-close">
        <i class="fa-solid fa-xmark text-white"></i>
    </span>
    <p class="text-white m-auto p-3">{{session('success')}}</p>
</div>
@endif

@if(session()->has('danger'))
    
<div class="bg-danger w-25 text-center position-relative msg">
    <span class="position-absolute msg-close">
        <i class="fa-solid fa-xmark text-white"></i>
    </span>
    <p class="text-white m-auto p-3">{{session('danger')}}</p>
</div>
    
@endif