<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pastas Elena') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/492026431_1199091521653362_742366505237670123_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFfAbBKUcuiao66nH1-S7y4UmjSdaDQ_hFSaNJ1oND-EWJJ__jLBMKTbsoQbaqKbFB9jToDKcRau92vXFc-slzl&_nc_ohc=8MaHIFZYa-AQ7kNvwFThU9N&_nc_oc=Adn0x2Od-wkNpaE2ewrkP25WWhomqhTvQcVD8DmMh5oKv-BChN7yHfrO6hb9AIJKOds&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=Qdl3NPs_FbrGVqJkIcxlxA&oh=00_AfdDTWChfen-c7gNIFgLnPVKUl77j1GJG9DGaJJaz_N9IA&oe=68FF7A8E"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <img class="w-32 rounded-full" src="https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/492026431_1199091521653362_742366505237670123_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFfAbBKUcuiao66nH1-S7y4UmjSdaDQ_hFSaNJ1oND-EWJJ__jLBMKTbsoQbaqKbFB9jToDKcRau92vXFc-slzl&_nc_ohc=8MaHIFZYa-AQ7kNvwFThU9N&_nc_oc=Adn0x2Od-wkNpaE2ewrkP25WWhomqhTvQcVD8DmMh5oKv-BChN7yHfrO6hb9AIJKOds&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=Qdl3NPs_FbrGVqJkIcxlxA&oh=00_AfdDTWChfen-c7gNIFgLnPVKUl77j1GJG9DGaJJaz_N9IA&oe=68FF7A8E" alt="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    </body>
</html>
