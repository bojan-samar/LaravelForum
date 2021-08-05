<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,900" rel="stylesheet">


    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles

    @stack('meta')

</head>

    <body class="antialiased h-screen">

        <div x-data="{ sidemenu: false }" class="h-screen flex overflow-hidden" x-cloak
            @keydown.window.escape="sidemenu = false">

            @include('admin.layout.sidebar')

            <div class="flex-1 flex-col relative z-0 overflow-y-auto">
                @include('admin.layout.header')
                <div class="py-8 bg-gray-100 rounded-xl m-1 md:mx-4" style="min-height: 88%;border-radius: 0.8rem;">
                    <div class="container px-4 md:px-8">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

        @stack('scripts')
        @livewireScripts

    </body>

</html>
