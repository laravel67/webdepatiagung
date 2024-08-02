<x-content>
    <x-slide :slides="$slides" />
    {{-- Berita --}}
    <div class="row">
        <div class="col-md-4 order-md-last">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="my-md-3 p-3 bg-white rounded shadow-sm">
                        <h6 class="pb-2 mb-0 text-success card-header mx-0">{{ __('Sambutan Pimpinan PPS DEPATI AGUNG')
                            }}
                        </h6>
                        <div class="block">
                            <div class="p-3">

                                @if ($sambutan && $sambutan->image)

                                <img src="{{ asset('storage/'.$sambutan->image) }}" class="img-fluid">

                                @else

                                <img src="placeholder.jpg" class="img-fluid">

                                @endif

                            </div>

                            <small align="justify">

                                {!! $sambutan ? $sambutan->excerpt : '' !!}<a href="{{ route('sambutan') }}">{{
                                    __('Selengkapnya...') }}</a>,

                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="slideGaleri" class="carousel slide my-5 my-md-3 bg-white rounded shadow-sm"
                        data-ride="carousel">
                        <h6 class="pb-2 text-success card-header">{{ __('Galeri') }}</h6>
                        <div class="carousel-inner text-center">
                            @foreach($galeri as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <a href="">
                                    <img src="{{ asset($item->image) }}" class="img-top"
                                        style="height: 225px; width: 100%; display: block;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#slideGaleri" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slideGaleri" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-first">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h5 class="pb-2 mb-0 text-success card-header">{{ __('Postingan Terbaru') }}</h5>
                @forelse ( $posts as $post )
                <div class="media text-muted pt-3 d-flex align-items-center" data-aos="zoom-in" data-aos-duration="500">
                    @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" alt="" width="80" height="80"
                        class="img-fluid mr-2 d-none d-lg-block">
                    @else
                    <img src="https://placehold.jp/300x300.png" alt="" width="80" height="80"
                        class="img-fluid mr-2 d-none d-lg-block">
                    @endif
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark"><a href="{{ route('post',$post->slug) }}">{{ $post->title
                                    }}</a></strong>
                        </div>
                        <span class="d-block">
                            {{ $post->excerpt }} <a href="{{ route('post',$post->slug) }}">{{ __('Selengkapnya') }}</a>
                        </span>
                        @if ($post->author)
                        <a href="{{ route('posts', ['author' => $post->author->username]) }}" class="badge badge-light">
                            <i class="fa-solid fa-user-tie"></i> {{ $post->author->name }}
                        </a>
                        @else
                        <span class="badge badge-light text-muted">{{ __('Unknown Author') }}</span>
                        @endif
                        <small class="text-muted">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{
                            \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                            Y')}}
                        </small>
                    </div>
                </div>
                @empty
                <p class="text-muted">
                    {{ __('Belum ada berita yang dipublish') }}
                </p>
                @endforelse
                <div class="text-right mt-2">
                    <a href="{{ route('posts') }}" class="btn btn-success"><i class="fa-regular fa-newspaper"></i> {{
                        __('Semua Berita') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-content>