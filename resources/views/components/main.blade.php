<x-layouts.app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
        </div>
        <div class="mt-5">
            <x-notify-toast></x-notify-toast>
            {{ $slot }}
        </div>
    </main>
</x-layouts.app>