<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>
    <div class="flex h-screen font-inter">
        <aside class="flex flex-shrink flex-col w-60 bg-primary-admin">
            <div class="flex justify-center h-16">
                <img src="{{ asset('img/logo.png') }}" class="w-4/12">
            </div>
            <div class="p-6">
                <ul class="text-white flex flex-col gap-6 font-bold text-2xl">
                    <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'text-primary-yellow' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'admin.form-driver' ? 'text-primary-yellow' : '' }}">
                        <a href="{{ route('admin.form-driver') }}">Form Driver</a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'admin.form-merchant' ? 'text-primary-yellow' : '' }}">
                        <a href="{{ route('admin.form-merchant') }}">Form Merchant</a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'admin.kontak-kami' ? 'text-primary-yellow' : '' }}">
                        <a href="{{ route('admin.kontak-kami') }}">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="flex flex-1 flex-col w-10/12">
            <header
                class="h-16 bg-primary-admin flex flex-row gap-4 justify-end text-gray-300 text-xl items-center p-8">
                <div class="flex items-center">
                    <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                    </svg>
                    &nbsp;
                    {{ Auth::user()->name }}
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-white">Log out</button>
                </form>
            </header>
            <main class="flex-1 overflow-y-auto px-12 py-12 bg-primary-white">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('script')
</body>

</html>
