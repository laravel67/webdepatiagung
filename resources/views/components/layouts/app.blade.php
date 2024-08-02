<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
    <link rel="shortcut icon" href="{{ asset('favicon-16x16.png') }}" type="image/x-icon">
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/trix-editor.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('toast.css') }}">
    <title>{{ config('app.name') . ' | ' . $title }}</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="container-fluid">
        <div class="row">
            <x-link-items/>
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
    </script>
    {{-- <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script> --}}
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="dashboard.js"></script>
    <script src="{{ asset('backend/js/trix-editor.js') }}"></script>
    <script src="{{ asset('backend/js/sweet-alert.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('toast.js') }}"></script>
    @stack('js')
    <script>
        window.addEventListener('show-delete-confirmation', event=>{
                Swal.fire({
                    title: 'Kamu Yakin ?',
                    text: "Tindakan ini akan menghapus data secara permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed')
                    }
                })
            })
    </script>
</body>

</html>