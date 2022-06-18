<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" />
    <title>Digital Trans Milenial</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet">
    <style>
        .slider .slick-slide img {
            width: 100%;
            margin: auto;
        }

    </style>
</head>

<body style="background-color: #343a40" class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" width="60" height="40" class="d-inline-block align-top" alt="">
            </a>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 text-center justify-center">
        <div class="container flex flex-col items-center justify-center">
            <h1 style="color: #12e343">UP INDONESIA</h1>
            <hr style="border:1px solid #8b949a; width: 10%;" />
            <h4 style="color: #8b949a">#MUDAHKANPERJALANANMU</h4>
            <p style="color: #f8f9fa">
                PT DIGITAL TRANS MILENIAL atau DTM merupakan perusahaan platform digital yang saat ini sedang
                mengembangkan<br />
                usahanya dalam bisnis transportasi online dan marketplace.</p>
        </div>
        <div class="col mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="col-sm-2">
                    <a href="{{ route('join-us') }}"><button class="btn-lgn border border-yellow-500">Join
                            Us</button></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="slider">
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/1.jpg') }}" class="d-block w-50" alt="..." height="500px">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/2.jpg') }}" class="d-block  w-50" alt="..." height="500px">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/3.jpg') }}" class="d-block  w-50" alt="..." height="500px">
                    </a>
                </div>
            </div>
        </div>

    </main>

    <footer class="footer navbar mt-auto py-3 bg-dark " style="color: white;">
        <div class="col-sm-7">
            <div class="row">

                <div class="mr-1">
                    <p>Our Customers :</p>
                </div>
                <div class="">
                    <img src="{{ asset('img/no_img.jpeg') }}" width="60" height="40" class="d-inline-block align-top"
                        alt="">
                </div>
            </div>
        </div>
        <div class="col-sm-3 text-right">
            <p>copyright by Digital Trans Milenial 2020.</p>
        </div>
        <div class="col-sm-2 text-right">
            <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span class="fab fa-youtube fa-lg"
                    style="color: rgb(128, 128, 128)"></span></a>
            <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span
                    class="fab fa-instagram fa-lg" style="color: rgb(128, 128, 128)"></span></a>
            <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span class="fab fa-facebook fa-lg"
                    style="color: rgb(128, 128, 128)"></span></a>
            <a class="social-media-icon mr-3" href="https://link_social_mendia_anda"><span class="fab fa-twitter fa-lg"
                    style="color: rgb(128, 128, 128)"></span></a>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500
            });
        });
    </script>
</body>

</html>
