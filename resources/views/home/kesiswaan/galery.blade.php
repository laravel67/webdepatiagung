<x-content>
    <x-profile-header />
    <div class="card mt-3 mb-1">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @forelse ( $posts as $post )
                    <div class="col-md-4 mb-3" data-aos="zoom-in" data-aos-duration="500">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/'.$post->image) }}"
                                style="height: 225px; width: 100%; display: block;">
                        </div>
                    </div>
                    @empty
                    <div class="col text-center">
                        <img src="{{ asset('frontend/img/clipboard.png') }}" alt="" srcset="" class="img-fluid" width="400">
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <small class="d-flex align-items-center justify-content-end m-3" style="overflow: hidden">
        {{ $posts->links('pagination::bootstrap-4') }}
    </small>
    </div>
</x-content>