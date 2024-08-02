<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon-16x16.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/offcanvas.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>DEPATI AGUNG</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #backToTopBtn {
            position: fixed;
            bottom: 10px;
            right: 10px;
            width: 50px;
            height: 50px;
            z-index: 999;
            display: none;
        }
    </style>
</head>

<body class="bg-gray">
    <x-topbar-menu/>
    <main role="main" class="container-md mb-5">
        @yield('content')
        {{ $slot }}
        <button class="btn btn-success rounded-circle" onclick="topFunction()" id="backToTopBtn" class="btn btn-primary"
            title="Go to top"><i class="fa-solid fa-chevron-up"></i></button>
    </main>
    <x-footer/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/offcanvas.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(document).ready(function() {
        // Menampilkan dropdown saat mouse masuk
        $('.nav-item.dropdown').hover(function() {
        $(this).find('.dropdown-menu').addClass('show');
        }, function() {
        // Menyembunyikan dropdown saat mouse meninggalkan
        $(this).find('.dropdown-menu').removeClass('show');
        });
        });
    </script>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      var mybutton = document.getElementById("backToTopBtn");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0; 
      document.documentElement.scrollTop = 0;
    }
    </script>
</body>

</html>