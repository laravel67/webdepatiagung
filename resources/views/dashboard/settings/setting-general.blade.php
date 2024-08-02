<x-main>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-dark" role="alert">
                <i class="fa-solid fa-wrench"></i> Sambutan
            </div>
            @include('dashboard.pengaturan.sambutan')
        </div>
        <div class="col-md-6">
            <div class="alert alert-dark" role="alert">
                <i class="fa-solid fa-images"></i> Album
            </div>
            @livewire('pengaturan.galeri')
        </div>
    </div>
    <hr>
    <div class="row my-5">
        <div class="col-md-6">
            <div class="alert alert-dark" role="alert">
                <i class="fa-solid fa-calendar"></i> Acara
            </div>
            @livewire('pengaturan.acara')
        </div>
        <div class="col-md-6">
            <div class="alert alert-dark" role="alert">
                <i class="fa-solid fa-image"></i> Slides
            </div>
            @livewire('pengaturan.slide')
        </div>
    </div>
</x-main>