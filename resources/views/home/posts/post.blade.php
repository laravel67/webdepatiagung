<x-content>
    <div class=" my-md-5 p-3 bg-white rounded shadow-sm ">
        <div class="d-flex justify-content-end m-0 p-0">
            {!! $shareComponent !!}
        </div>
        <h5 class="mb-0 text-success">{{ $post->title }}</h5>
        <div class="row">
            <div class="col p-3" data-aos="zoom-in" data-aos-duration="1000">
                @if ($post->image)
                <img class="img-fluid w-100" src="{{ asset('storage/'.$post->image) }}">
                @else
                <img class="img-fluid w-100" src="https://placehold.jp/1200x600.png">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="{{ route('posts', ['author' => $post->author->username]) }}" class="badge badge-light">
                                <i class="fa-solid fa-user-tie"></i>
                                {{$post->author->name }}
                            </a>
                            <a href="{{ route('posts', ['category' => $post->category->slug]) }}" class="badge badge-light">
                                <i class="fa-solid fa-tag"></i>
                                {{$post->category->name }}
                            </a>
                            <small class="text-muted text-end">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{
                                \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                                Y')}}
                            </small>
                        </div>
                    </div>
                    <article align='justify' class="card-text text-dark" style="overflow: hidden">
                        {!! $post->body !!}
                    </article>
                    <x-btn-back></x-btn-back>
                </div>
            </div>
        </div>
    </div>
</x-content>