<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Impact&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                font-family: 'Impact', 'Arial Black', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div id="background-container"></div>

    <style>
        #background-container {
            position: fixed;
            top: -50px; 
            left: -50px; 
            width: calc(100% + 100px);
            height: calc(100% + 100px);
            background-image: url('{{ asset('background.png') }}');
            background-size: cover;
            background-position: center center;
            filter: brightness(0.8) blur(3px); 
            z-index: -1;
            transition: background-position 0.1s linear; 
        }
    </style>

    <script>
        document.addEventListener('mousemove', function(e) {
            const container = document.getElementById('background-container');
            const speed = 0.5; 

            const x = (e.clientX / window.innerWidth - 0.5) * speed * 100;
            const y = (e.clientY / window.innerHeight - 0.5) * speed * 100;
            

            container.style.backgroundPosition = `calc(50% + ${x}%) calc(50% + ${y}%)`;
        });
    </script>
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-p-dark shadow-md overflow-hidden sm:rounded-3xl overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
