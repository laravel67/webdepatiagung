{{-- @extends('components.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-7">
        <h6 class="border-bottom p-2">
            <a href="{{ route('apost.index') }}" class="btn btn-secondary">Kembali</a>
            @can('user')
            <a href="{{ route('apost.edit', $post->slug) }}" class="btn btn-warning text-white"><i
                    class="fa-solid fa-edit"></i>
                Ubah</a>
            @endcan
        </h6>
        <div class=" mb-3">
            @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->image }}"
                style="height: 400px; width: 100%; display: block;overflow: hidden;">
            @else
            <img src="{{ asset('backend/img/no-image.svg') }}" class="card-img-top" alt="{{ $post->image }}"
                style="height: 400px; width: 100%; display: block;overflow: hidden;">
            @endif
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <article align='justify' class="card-text text-dark blockquote">
                    {!! $post->body !!}
                </article>
                <p class="card-text">
                    <small class="text-muted text-end">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{
                        \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                        Y')}}
                    </small>
                    <small class="text-muted text-end mx-1">
                        <i class="fa-solid fa-user"></i>
                        {{$post->author->name}}
                    </small>
                    <small class="text-muted text-end mx-1">
                        <i class="fa-solid fa-tag"></i>
                        {{$post->category->name}}
                    </small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 d-none d-md-flex">
        <img src="{{ asset('backend/img/undraw_designer_girl_re_h54c.svg') }}" class="img-fluid">
    </div>
</div>
@endsection
@push('js')
@include('dashboard.posts.script')
@endpush --}}

<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom p-2">
                    <x-btn-back></x-btn-back>
                    <x-btn-action href="{{ route('apost.edit', $post->slug) }}" color="warning">{{ __('edit') }}</x-btn-action>
            </h6>
            <div class=" mb-3">
                @if ($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->image }}"
                    style="height: 400px; width: 100%; display: block;overflow: hidden;">
                @else
                <img src="{{ asset('backend/img/no-image.svg') }}" class="card-img-top" alt="{{ $post->image }}"
                    style="height: 400px; width: 100%; display: block;overflow: hidden;">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <article align='justify' class="card-text text-dark blockquote">
                        {!! $post->body !!}
                    </article>
                    <p class="card-text">
                        <small class="text-muted text-end">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{
                            \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                            Y')}}
                        </small>
                        <small class="text-muted text-end mx-1">
                            <i class="fa-solid fa-user"></i>
                            {{$post->author->name}}
                        </small>
                        <small class="text-muted text-end mx-1">
                            <i class="fa-solid fa-tag"></i>
                            {{$post->category->name}}
                        </small>
                    </p>
                </div>
            </div>
        </div>
        <x-image-draw></x-image-draw>
    </div>
</x-main>