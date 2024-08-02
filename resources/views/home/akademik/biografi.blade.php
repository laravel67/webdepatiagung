<x-content>
    <x-profile-header />
<div class="card mt-3 mb-1">
    <div class="card-body">
        <div class="row justify-content-center align-items-center text-center">
            @foreach ($gurus as $guru)
            <div class="col-lg-4 col-6" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
                data-aos-duration="1000">
                @if ($guru->image)
                <img src="{{ asset('storage/'.$guru->image) }}" class="bd-placeholder-img rounded-circle" width="150"
                    height="150">
                @else
                <svg class="bd-placeholder-img rounded-circle" width="150" height="150"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 150x150"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>
                @endif
                <h5>
                    {{ $guru->name }}</h5>
                <p>
                    <a class="btn btn-outline-success btn-sm" href="#exampleModalLong{{ $guru->id }}"
                        data-toggle="modal">Detail</a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('home.akademik.modal-detail-biografi')
</x-content>