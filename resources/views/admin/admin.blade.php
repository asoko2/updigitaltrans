<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN LOGIN | UP INDONESIA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="min-h-screen bg-primary-admin flex flex-col justify-between">
        <img src="{{ asset('img/logo.png') }}" width="100" />
        <div class="flex-shrink-0 flex flex-col justify-center items-center mb-auto pt-10">
            <p class="text-8xl font-bold text-white">UP INDONESIA</p>
            <div class="text-primary text-2xl my-2">#MUDAHKANJALANMU</div>
            <div class="w-1/3 mt-12">
                @if ($errors->any())
                    <div class="text-white text-center p-4 rounded-xl bg-red-500 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" placeholder="Email" name="email"
                        class="bg-white placeholder-primary-admin placeholder-opacity-80 focus:outline-none focus:ring focus:ring-primary font-bold rounded-xl px-4 py-3 w-full mb-4 transition-all ease-in-out duration-100" />
                    <input type="password" placeholder="Password" name="password"
                        class="bg-white placeholder-primary-admin placeholder-opacity-80 focus:outline-none focus:ring focus:ring-primary font-bold rounded-xl px-4 py-3 w-full mb-4 transition-all ease-in-out duration-100" />
                    <button type="submit"
                        class="bg-primary float-right px-12 py-3 rounded-md text-white font-semibold">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
