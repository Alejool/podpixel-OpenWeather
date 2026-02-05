<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PodPixel OpenWeather</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 antialiased">
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="text-center py-8 text-3xl font-bold">
            <a href="{{ route('cities.index') }}" class="text-orange-600">
                PodPixel OpenWeather
            </a>
        </div>
    </nav>

    <main class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>

</html>
