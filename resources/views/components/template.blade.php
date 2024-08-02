<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon-16x16.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon-32x32.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/offcanvas.css') }}">
    <title>PPDB DEPATI AGUNG</title>
</head>

<body class="bg-gray">
    <x-template-topbar-menu/>
    <main role="main" class="container-md my-5">
        <div class="py-md-5">
            {{ $slot }}
        </div>
    </main>
    <div class="bottom-0">
        <x-footer/>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/offcanvas.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @stack('js')
</body>

</html>