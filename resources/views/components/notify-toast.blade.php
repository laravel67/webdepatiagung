@if(session()->has('success'))
<div class="toaster">
    <div class="toast-content">
        <i class="fa-solid fa-check"></i>
        <div class="message">
            <span class="text text-1">Successfuly!</span>
            <span class="text text-2">{{ session('success') }}</span>
        </div>
        <i class="fa-solid fa-xmark close close-toastr"></i>
        <div class="progress-toaster"></div>
    </div>
</div>
@endif