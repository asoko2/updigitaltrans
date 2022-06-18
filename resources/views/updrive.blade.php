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
    <main class="mx-auto mt-10">
        <div class="prose mx-auto w-1/2 text-center mb-8 font-poppins">
            <h1 class="prose-xl text-7xl font-bold">UP DRIVE</h1>
        </div>
        <div class="flex flex-col gap-12">
            <div class="flex flex-row gap-16 bg-gray-100 px-24 py-8">
                <div class="flex w-1/2 items-center justify-center">
                    <img src="{{ asset('/img/promo/3.jpg') }}" class="h-96" />
                </div>
                <div class="flex flex-col gap-6 w-1/2">
                    <div class="text-3xl">UP Bike</div>
                    <div>Deskripsi Singkat</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nisi dolorum totam vero explicabo
                        laborum illum suscipit, aliquid maiores optio facilis corporis officiis ea nulla debitis expedita
                        ducimus animi nobis?
                    </div>
                    <div>
                        <a href="{{ url('/register-updriver') }}"
                            class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-16 py-2 transform transition-all ease-in-out duration-100">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-16  px-24 py-8">
                <div class="flex flex-col gap-6 w-1/2">
                    <div class="text-3xl">UP Car</div>
                    <div>Deskripsi Singkat</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nisi dolorum totam vero explicabo
                        laborum illum suscipit, aliquid maiores optio facilis corporis officiis ea nulla debitis expedita
                        ducimus animi nobis?
                    </div>
                    <div>
                        <a href="{{ url('/register-updriver') }}"
                            class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-16 py-2 transform transition-all ease-in-out duration-100">Daftar</a>
                    </div>
                </div>
                <div class="flex w-1/2 items-center justify-center">
                    <img src="{{ asset('/img/promo/2.jpg') }}" class="h-96" />
                </div>
            </div>
            <div class="flex flex-row gap-16 bg-gray-100 px-24 py-8">
                <div class="flex w-1/2 items-center justify-center">
                    <img src="{{ asset('/img/promo/1.jpg') }}" class="h-96" />
                </div>
                <div class="flex flex-col gap-6 w-1/2">
                    <div class="text-3xl">UP Food</div>
                    <div>Deskripsi Singkat</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nisi dolorum totam vero explicabo
                        laborum illum suscipit, aliquid maiores optio facilis corporis officiis ea nulla debitis expedita
                        ducimus animi nobis?
                    </div>
                    <div>
                        <a href="{{ url('/register-updriver') }}"
                            class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-16 py-2 transform transition-all ease-in-out duration-100">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-16 px-24 py-8">
                <div class="flex flex-col gap-6 w-1/2">
                    <div class="text-3xl">UP Send</div>
                    <div>Deskripsi Singkat</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nisi dolorum totam vero explicabo
                        laborum illum suscipit, aliquid maiores optio facilis corporis officiis ea nulla debitis expedita
                        ducimus animi nobis?
                    </div>
                    <div>
                        <a href="{{ url('/register-updriver') }}"
                            class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-16 py-2 transform transition-all ease-in-out duration-100">Daftar</a>
                    </div>
                </div>
                <div class="flex w-1/2 items-center justify-center">
                    <img src="{{ asset('/img/promo/1.jpg') }}" class="h-96" />
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
