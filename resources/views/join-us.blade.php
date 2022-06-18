@extends('layouts.welcome')
@section('pageTitle')
    <h2 class="text-5xl text-yellow-400">UP INDONESIA</h2>
@endsection
@section('slider')
    <div class="flex px-36 w-full">
        <div class="w-10/12 mx-auto">
            <div class="slider flex items-center justify-center m-auto">
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/1.jpg') }}" class="d-block w-5/12" alt="..." width="300px">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/2.jpg') }}" class="d-block w-5/12" alt="..." width="300px">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="{{ asset('/img/promo/3.jpg') }}" class="d-block w-5/12" alt="..." width="300px">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <main class="mx-auto px-16 mt-10">
        <div class="flex flex-row mx-auto gap-16">
            <div class="flex flex-col gap-4 justify-center items-center w-2/6 mx-auto p-6">
                <div>
                    <i class="fas fa-motorcycle fa-5x" style="color: #e73b14"></i>
                </div>
                <div>
                    <a href="{{ url('/updrive') }}" class="underline">UP DRIVE</a>
                </div>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum provident nesciunt possimus explicabo
                    a dicta tenetur ducimus doloremque tempora dignissimos vel corporis officiis, saepe magnam incidunt
                    voluptatum minima quae! Repellat.
                </div>
            </div>
            <div class="flex flex-col gap-4 justify-center items-center w-2/6 mx-auto p-6">
                <div>
                    <i class="fas fa-store fa-5x" style="color: #e73b14"></i>
                </div>
                <div>
                    <a href="{{ url('/upmerchant') }}" class="underline">UP MERCHANT</a>
                </div>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia eaque, adipisci voluptatem, quos
                    quibusdam illo inventore id, voluptatum suscipit explicabo laborum eius. Architecto dolorum voluptas
                    id cum eum fugit est?
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500
            });
        });
    </script>
@endsection
