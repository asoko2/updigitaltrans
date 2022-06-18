@extends('admin.layout.app')
@section('content')
    <div class="font-bold text-2xl text-primary-admin mb-6">Dashboard</div>
    <div class="flex flex-row gap-4 justify-between w-full">
        <a href="{{ route('admin.slide-banner') }}"
            class="hover:shadow-2xl rounded-xl p-4 transform transition-all ease-in duration-200 flex flex-col items-center">
            <svg class="w-11/12" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M4,3H20A2,2 0 0,1 22,5V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V5A2,2 0 0,1 4,3M4,7V10H8V7H4M10,7V10H14V7H10M20,10V7H16V10H20M4,12V15H8V12H4M4,20H8V17H4V20M10,12V15H14V12H10M10,20H14V17H10V20M20,20V17H16V20H20M20,12H16V15H20V12Z" />
            </svg>
            <div class="w-full flex justify-start text-primary-yellow font-bold text-3xl mt-4">Slide Banner</div>
        </a>
        <a href="{{ route('admin.user') }}"
            class="hover:shadow-2xl rounded-xl p-4 transform transition-all ease-in duration-200 flex flex-col items-center">
            <svg class="w-11/12" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
            </svg>
            <div class="text-primary-yellow font-bold text-3xl mt-4">User</div>
        </a>
        <a href="{{ route('admin.form-driver') }}"
            class="hover:shadow-2xl rounded-xl p-4 transform transition-all ease-in duration-200 flex flex-col items-center">
            <svg class="w-11/12" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M3,6V22H21V24H3A2,2 0 0,1 1,22V6H3M16,9H21.5L16,3.5V9M7,2H17L23,8V18A2,2 0 0,1 21,20H7C5.89,20 5,19.1 5,18V4A2,2 0 0,1 7,2M7,4V18H21V11H14V4H7Z" />
            </svg>
            <div class="text-primary-yellow font-bold text-3xl mt-4">Form Pendaftaran Driver</div>
        </a>
    </div>
@endsection
