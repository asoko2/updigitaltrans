<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
</head>

<body>
    <div class="flex flex-col h-screen">
        <header
            class="h-16 z-30 fixed w-full py-3 px-5 bg-primary-admin-primary text-white flex flex-row justify-between">
            <div>
                <img src="{{ asset('img/logo.png') }}" class="h-full">
            </div>
            <div class="flex flex-row gap-4 items-center">
                <div class="flex items-center">
                    <span class="material-icons">
                        person
                    </span>
                    &nbsp;{{ Auth::user()->name }}
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </header>
        <div class="h-full flex flex-row mt-16">
            <aside class="w-56 fixed h-full p-5 font-bold text-2xl bg-primary-admin-primary">
                <ul class="text-white flex flex-col gap-4">
                    <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'text-primary-yellow' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Form Driver</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Form Merchant</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Slide Banner</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">User</a>
                    </li>
                </ul>
            </aside>
            <main class="pt- pl-56 w-full flex-1 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>