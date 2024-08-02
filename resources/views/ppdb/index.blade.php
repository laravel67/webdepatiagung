<x-template>
    <div class="my-5">
        @if ($brosur && $brosur->image)
        <img class="img-fluid w-100" src="{{ asset('storage/brosurs/' . $brosur->image) }}" alt="Brosur">
        @else
        <p class="text-center alert alert-secondary">{{ __('Informasi pendaftaran belum ada.') }}</p>
        @endif
    </div>
</x-template>