<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="http://fonts.gstatic.com">
    <link href="http://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
    <div>
        <div class="bg-light h-screen">
            @livewire('navigation')
            <div class="py-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
