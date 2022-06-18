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
            <h1 class="prose-xl text-7xl font-bold">UP MERCHANT</h1>
        </div>
        <div class="flex flex-col gap-12">
            <div class="flex flex-row gap-16 bg-gray-100 px-24 py-8">
                <div class="flex flex-row mx-auto gap-16">
                    <div class="flex flex-col gap-4 bg-white w-3/6 mx-auto p-6">
                        <div class=" justify-start">
                            <div class="flex flex-col">
                                <p class="text-2xl">01.</p>
                                <a href="{{ url('/upmerchant') }}" class="text-2xl font-bold">UP Food</a>
                            </div>
                            <hr class="border-black border w-1/2 my-4">
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum provident nesciunt possimus
                                explicabo
                                a dicta tenetur ducimus doloremque tempora dignissimos vel corporis officiis, saepe magnam
                                incidunt
                                voluptatum minima quae! Repellat.
                            </div>
                        </div>
                        <div class="text-right w-full">
                            <a href="{{ url('/register-upmerchant') }}"
                                class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-6 py-2 transform transition-all ease-in-out duration-100">DAFTAR</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 bg-white w-3/6 mx-auto p-6">
                        <div class=" justify-start">
                            <div class="flex flex-col">
                                <p class="text-2xl">02.</p>
                                <a href="{{ url('/upmerchant') }}" class="text-2xl font-bold">UP Merchant</a>
                            </div>
                            <hr class="border-black border w-1/2 my-4">
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum provident nesciunt possimus
                                explicabo
                                a dicta tenetur ducimus doloremque tempora dignissimos vel corporis officiis, saepe magnam
                                incidunt
                                voluptatum minima quae! Repellat.
                            </div>
                        </div>
                        <div class="text-right w-full">
                            <a href="{{ url('/register-upmerchant') }}"
                                class="bg-primary-contrast hover:bg-primary-contrast-hover text-white px-6 py-2 transform transition-all ease-in-out duration-100">DAFTAR</a>
                        </div>
                    </div>
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
