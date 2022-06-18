@extends('layouts.welcome')
@section('package')
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
@endsection
@section('pageTitle')
    <h2 class="text-5xl text-yellow-400">UP DRIVE</h2>
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
        <form action="{{ url('/register-updriver') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row gap-24 px-32">
                <div class="flex flex-col gap-6 w-1/2 px-8 min-h-fit bg-gray-100 rounded-xl p-8 shadow-xl">
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label class="font-semibold w-3/12">Tipe Driver</label>
                        <input type="radio" name="tipe_driver" id="driver1" value="1" required />
                        <label for="driver1">Up Drive</label>
                        <input type="radio" name="tipe_driver" id="driver2" value="2" />
                        <label for="driver2">Up Car</label>
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_hp" class="font-semibold w-3/12">No. HP</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_hp" placeholder="No. HP" value="{{ old('no_hp') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="nama" class="font-semibold w-3/12">Nama</label>
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
                        <label for="tanggal_lahir" class="font-semibold w-3/12">Tanggal Lahir</label>
                        <input type="date"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="alamat" class="font-semibold w-3/12">Alamat</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="merk" class="font-semibold w-3/12">Merk Kendaraan</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="merk" placeholder="Contoh : Toyota, Honda, Mitsubishi" value="{{ old('merk') }}"
                            required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="tipe_kendaraan" class="font-semibold w-3/12">Tipe Kendaraan</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="tipe_kendaraan" placeholder="Contoh : Avanza, Xenia, Agya, Supra, Mio, N-MAX"
                            value="{{ old('tipe_kendaraan') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="warna_kendaraan" class="font-semibold w-3/12">Warna Kendaraan</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="warna_kendaraan" placeholder="Contoh : Merah, Biru, Hitam, Silver"
                            value="{{ old('warna_kendaraan') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_kendaraan" class="font-semibold w-3/12">No. Kendaraan</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_kendaraan" placeholder="No.Kendaraan" value="{{ old('no_kendaraan') }}" required />
                    </div>

                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_sim" class="font-semibold w-3/12">No. SIM</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_sim" placeholder="123450xxx" value="{{ old('no_sim') }}" required />
                    </div>
                    <div class="flex flex-row w-full gap-4 items-center">
                        <label for="no_stnk" class="font-semibold w-3/12">No. STNK</label>
                        <input type="text"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full"
                            name="no_stnk" placeholder="182740xx" value="{{ old('no_stnk') }}" required />
                    </div>
                </div>
                <div class="flex flex-col gap-6 w-1/2 px-8 bg-gray-100 rounded-xl p-8 h-fit">
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
                        <label for="fotoFile">Scan SIM</label>
                        <input type="file"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                            name="simFile" required />
                    </div>
                    <div>
                        <label for="fotoFile">Scan STNK</label>
                        <input type="file"
                            class="border-0 p-2 focus:ring-2 focus:ring-opacity-30 focus:ring-gray-500 shadow-md rounded-md w-full bg-white"
                            name="stnkFile" required />
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-primary-bg text-primary hover:bg-primary hover:text-primary-bg font-bold text-lg px-3 py-2 rounded-md w-full transform transition-colors ease-out duration-150">DAFTAR</button>
                    </div>
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
        });
    </script>
@endsection
