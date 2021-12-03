<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Meme Hub - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" integrity="sha512-RntatPOhEcQEA81gC/esYoCkGkL7AYV7TeTPoU+R9zE44/yWxVvLIBfBSaMu78rhoDd73ZeRHXRJN5+aPEK53Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield("customCSS")
    <livewire:styles />
</head>
<body class="antialiased">
    <div class="loading" id="loading">
        <div class="loader"></div>
    </div>
    <livewire:navbar />
    <div class="container mx-auto lg:px-16 px-8" style="min-height:calc(90vh - 100px);">
        @yield('content')
    </div>
    <livewire:footer />

    <livewire:scripts />
{{--    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>--}}
{{--    <x-livewire-alert::scripts />--}}
{{--    <x-livewire-alert::flash />--}}

    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <x-livewire-alert::scripts />
    <script src="{{ asset('js/app.js') }}"></script>
    @yield("customJS")
</body>
</html>
