<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Digital Trans Milenial</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        .slider .slick-slide img {
            /* width: 100%; */
            margin: auto;
        }

    </style>
    @yield('package')
</head>

<body class="flex flex-col min-h-screen justify-between  font-nunito">

    <header class="h-20 bg-gray-200  w-full flex">
        <div class="flex w-1/12  items-center justify-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/img/logo.png') }}" class="scale-25" />
            </a>
        </div>
        <div class="flex flex-row gap-16 w-10/12 justify-center items-center">
            <div class="text-gray-500 hover:text-gray-900 hover:font-semibold">
                <a href="{{ url('/updrive') }}">Mitra Driver</a>
            </div>
            <div class="text-gray-500 hover:text-gray-900 hover:font-semibold">
                <a href="{{ url('/upmerchant') }}">Mitra Merchant</a>
            </div>
            <div class="text-gray-500 hover:text-gray-900 hover:font-semibold">
                <a href="{{ url('/contact-us') }}">Kontak Kami</a>
            </div>
        </div>
        <div class="w-1/12"></div>
    </header>
    <div class="mb-auto">
        <div class="flex w-full h-36 items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                @yield('pageTitle')

                <h4>#MUDAHKANJALANMU</h4>
            </div>
        </div>
        @yield('slider')
        @yield('content')
    </div>
    <footer class="flex flex-row justify-between items-center mt-8 py-3 bg-gray-800 text-white">
        <div class="flex flex-row gap-8">
            <div>
                <p>Our Customers :</p>
            </div>
            <div class="">
                <img src="{{ asset('img/no_img.jpeg') }}" width="60" height="40" class="d-inline-block align-top"
                    alt="">
            </div>
        </div>
        <div class="flex flex-row gap-16">
            <div class="col-sm-3 text-right">
                <p>copyright by Digital Trans Milenial 2020.</p>
            </div>
            <div class="col-sm-2 text-right">
                <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span
                        class="fab fa-youtube fa-lg" style="color: rgb(128, 128, 128)"></span></a>
                <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span
                        class="fab fa-instagram fa-lg" style="color: rgb(128, 128, 128)"></span></a>
                <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span
                        class="fab fa-facebook fa-lg" style="color: rgb(128, 128, 128)"></span></a>
                <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span
                        class="fab fa-twitter fa-lg" style="color: rgb(128, 128, 128)"></span></a>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('js')
</body>

</html>
