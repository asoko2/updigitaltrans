@extends('layouts.welcome')
@section('pageTitle')
    <h2 class="text-5xl text-yellow-400">UP INDONESIA</h2>
@endsection
@section('content')
    <main class="mx-auto mt-10">
        <div class="w-full">
            <img src="{{ asset('/img/promo/1.jpg') }}" class="w-4/6 mx-auto" />
        </div>
        <div class="mt-8 p-8 flex flex-col justify-center">
            <div class="text-3xl text-gray-500 font-bold font-poppins w-full text-center">KONTAK KAMI</div>
            <hr class="w-1/12 mx-auto border border-gray-500">
            <div class="flex flex-row w-full p-8">
                <div class="w-1/2 flex flex-col gap-8 justify-center">
                    <a href="https://www.facebook.com/up.idn.2021" target="_blank"
                        class="flex items-center gap-4 justify-start text-blue-700 hover:text-blue-500">
                        <i class="fa-brands fa-facebook-f fa-4x"></i>
                        Up Digital Indonesia (Lamongan Area)
                    </a>
                    <a href="mailto:uplamongan@gmail.com" target="_blank"
                        class="flex items-center gap-4 justify-start text-gray-500 hover:text-gray-600">
                        <i class="fa-solid fa-envelope fa-4x"></i>
                        uplamongan@gmail.com (Lamongan Area)
                    </a>
                    <a href="mailto:updigitaltransmilenial@gmail.com" target="_blank"
                        class="flex items-center gap-4 justify-start text-gray-500 hover:text-gray-600">
                        <i class="fa-solid fa-envelope fa-4x"></i>
                        updigitaltransmilenial@gmail.com (Cooperation Inquiry)
                    </a>
                </div>
                <div class="w-1/2 flex justify-center">
                    <form action="{{ route('contact-us.post') }}" method="POST" class="w-full flex gap-8 flex-col">
                        @if (session('error'))
                            <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="bg-teal-500 text-teal-900 bg-opacity-20 border border-teal-900 rounded-md p-4 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        @csrf
                        <div class="flex flex-row w-full gap-4 items-center">
                            <input type="text"
                                class="border border-gray-500 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                name="phone" placeholder="No. HP" value="{{ old('phone') }}" required />
                        </div>
                        <div class="flex flex-row w-full gap-4 items-center">
                            <input type="text"
                                class="border border-gray-500 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                name="name" placeholder="Nama" value="{{ old('name') }}" required />
                        </div>
                        <div class="flex flex-row w-full gap-4 items-center">
                            <input type="text"
                                class="border  border-gray-500 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                name="address" placeholder="Alamat" value="{{ old('address') }}" required />
                        </div>
                        <div class="flex flex-row w-full gap-4 items-center">
                            <input type="text"
                                class="border  border-gray-500 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                                name="description" placeholder="Keterangan" value="{{ old('description') }}" required />
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-primary-bg text-primary hover:bg-primary hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-full transform transition-colors ease-out duration-150">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>
@endsection
