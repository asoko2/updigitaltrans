@extends('layouts.welcome')
@section('package')
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
@endsection
@section('pageTitle')
    <h2 class="text-5xl text-yellow-400">UP DRIVE</h2>
@endsection

@section('style')
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: flex;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
@endsection

@section('content')
    <main class="mx-auto mt-10">
        @if ($errors->any())
            <div class="d-flex justify-center text-center w-1/2 mx-auto mb-10">
                <div class="bg-red-700 text-red-700 bg-opacity-20 rounded-md p-4 w-full">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('sukses'))
            <div class="d-flex justify-center text-center w-1/2 mx-auto mb-10">
                <div class="bg-teal-700 text-teal-700 bg-opacity-20 rounded-md p-4 w-full">
                    {{ session('sukses') }}
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="d-flex justify-center text-center w-1/2 mx-auto mb-10">
                <div class="bg-teal-700 text-teal-700 bg-opacity-20 rounded-md p-4 w-full">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <form action="{{ url('/register-upmerchant') }}" method="POST" enctype="multipart/form-data"
            class="w-full flex items-center justify-center register-form">
            @csrf
            <div class="rounded-xl shadow-xl w-2/5  bg-gray-100 p-8">
                <div class="form-section flex flex-col gap-6 min-h-fit">
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label class="font-semibold w-3/12">Tipe Merchant</label>
                        <input type="radio" name="tipe_merchant" id="merchant1" value="1" required />
                        <label for="merchant1">Up Food</label>
                        <input type="radio" name="tipe_merchant" id="merchant2" value="2" />
                        <label for="merchant2">Up Mart</label>
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_hp" class="font-semibold w-3/12">No. HP</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_hp" placeholder="No. HP" value="{{ old('no_hp') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="nama" class="font-semibold w-3/12">Nama Merchant</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="nama" placeholder="Nama" value="{{ old('nama') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_ktp" class="font-semibold w-3/12">No. KTP</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_ktp" placeholder="332144xxxxxxxxxx" value="{{ old('no_ktp') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="email" class="font-semibold w-3/12">Email</label>
                        <input type="email"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="email" placeholder="nama@email.com" value="{{ old('email') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="alamat" class="font-semibold w-3/12">Alamat Rumah</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required />
                    </div>
                </div>
                <div class="form-section flex flex-col gap-6 min-h-fit">
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="service" class="font-semibold w-3/12">Service</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="service" placeholder="Makanan berat, makanan ringan, snacks"
                            value="{{ old('service') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="detail" class="font-semibold w-3/12">Detail</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="detail" placeholder="" value="{{ old('detail') }}" required />
                    </div>
                    <div class="">
                        <label for="lokasi" class="font-semibold w-3/12">Lokasi Resto, Cafe, Mart</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="lokasi" placeholder="Contoh : Merah, Biru, Hitam, Silver" value="{{ old('lokasi') }}"
                            required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="jam_buka" class="font-semibold w-3/12">Jam Buka</label>
                        <input type="time"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="jam_buka" placeholder="No.Kendaraan" value="{{ old('jam_buka') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="jam_tutup" class="font-semibold w-3/12">Jam Tutup</label>
                        <input type="time"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="jam_tutup" placeholder="No.Kendaraan" value="{{ old('jam_tutup') }}" required />
                    </div>
                </div>
                <div class="form-section flex flex-col gap-6 min-h-fit">
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="password" class="font-semibold w-3/12">Password</label>
                        <input type="password"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="password" placeholder="Password" value="{{ old('password') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="password_confirmation" class="font-semibold w-3/12">Konfirmasi Password</label>
                        <input type="password"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="password_confirmation" placeholder="Konfirmasi Password"
                            value="{{ old('password_confirmation') }}" required />
                    </div>
                    <div>
                        <label for="fotoFile">Lampirkan Foto Terbaru</label>
                        <input type="file"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                            name="fotoFile" required />
                    </div>
                    <div>
                        <label for="fotoFile">Scan KTP</label>
                        <input type="file"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                            name="ktpFile" required />
                    </div>
                    <div>
                        <label for="fotoFile">Logo Atau Foto Usaha</label>
                        <input type="file"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                            name="usahaFile" required />
                    </div>
                </div>
                <div class="form-navigation mt-4 w-full flex justify-between">
                    <button type="button"
                        class="previous bg-primary-bg text-primary float-left hover:bg-primary hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-fit transform transition-colors ease-out duration-150">Previous</button>
                    <button type="button"
                        class="next bg-primary-bg text-primary hover:bg-primary float-right hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-fit transform transition-colors ease-out duration-150">Next</button>
                    <button type="submit"
                        class="bg-primary-bg text-primary hover:bg-primary hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-fit transform transition-colors ease-out duration-150">DAFTAR</button>
                </div>
            </div>
        </form>


    </main>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="no_hp"]').mask('0000000000000')
            $('input[name="no_sim"]').mask('0000000000000')
            $('input[name="no_stnk"]').mask('00000000')
            $('input[name="no_ktp"]').mask('0000000000000000')

            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            })

            $('.form-navigation .next').click(function() {
                $('.register-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                })
            })

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            })

            navigateTo(0);
        });
    </script>
@endsection
