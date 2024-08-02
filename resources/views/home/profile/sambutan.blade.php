<x-content>
    <x-profile-header/>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title text-center">بِسْــــــــــــــــــمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h5>
            <div class="text-center">
                @if ($sambutan ? $sambutan->image:'')
                <img src="{{ asset('storage/'.$sambutan->image) }}" width="350" class="img-thumbnail rounded">
                @endif
            </div>
            <article align="justify" class="card-text blockquote">
                {!! $sambutan ? $sambutan->body:'' !!}
            </article>
            <p class="card-text">
                <small class="text-muted">
                    {{ \Carbon\Carbon::parse($sambutan ? $sambutan->updated_at:'')->translatedFormat('j F Y') }}
                </small>
            </p>
        </div>
    </div>
</x-content>