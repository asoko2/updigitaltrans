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
            <div class="flex flex-row w-full">
                <div class="w-1/3">tes</div>
                <div class="w-1/3">tes</div>
                <div class="w-1/3">tes</div>
    </main>
@endsection
