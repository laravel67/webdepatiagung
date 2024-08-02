<x-content>
    <x-profile-header />
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="fisik-tab" data-toggle="tab" data-target="#fisik" type="button"
                    role="tab" aria-controls="fisik" aria-selected="true">
                    <h4>Fisik</h4>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nonfisik-tab" data-toggle="tab" data-target="#nonfisik" type="button"
                    role="tab" aria-controls="nonfisik" aria-selected="true">
                    <h4>Non Fisik</h4>
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="fisik" role="tabpanel" aria-labelledby="fisik-tab">
                @forelse ( $fisik as $post )
                <div class="mb-2 border-bottom p-2" data-aos="zoom-in" data-aos-duration="500">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="" width="300" height="300"
                                class="img-fluid">
                            @else
                            <img src="https://placehold.co/400" alt="" width="300" height="300" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <article>
                                <h3>{{ $post->name }}</h3>
                                <p align='justify'>
                                    {!! $post->deskripsi !!}
                                </p>
                            </article>
                            <small class="text-muted">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{
                                \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                                Y')}}
                            </small>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">
                    Belum ada ekstra kulikuler.
                </p>
                @endforelse
            </div>
            <div class="tab-pane fade" id="nonfisik" role="tabpanel" aria-labelledby="nonfisik-tab">
                @forelse ( $nonfisik as $post )
                <div class="mb-2 border-bottom p-2" data-aos="zoom-in" data-aos-duration="500">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="" width="300" height="300"
                                class="img-fluid">
                            @else
                            <img src="https://placehold.co/400" alt="" width="300" height="300" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <article>
                                <h3>{{ $post->name }}</h3>
                                <p align='justify'>
                                    {!! $post->deskripsi !!}
                                </p>
                            </article>
                            <small class="text-muted">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{
                                \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                                Y')}}
                            </small>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">
                    Belum ada ekstra kulikuler.
                </p>
                @endforelse
            </div>
        </div>
    </div>
</x-content>