<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Boosting') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script >
        const Boosting = {
            stripeKey: "{{ config('services.stripe.key') }}"
        };

        window.App = {!! json_encode([
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <style>
        [v-cloak]{
            display: none;
        }
    </style>
</head>
<body>
    <div id="app" v-cloak>
        @include('layouts.nav')
        <main class="py-4">
            <div class="container">
                @include('flash::message')

                @yield('content')
            </div>
        </main>

        <flash-message message="{{ session('flash') }}"></flash-message>
        <div v-cloak>
            @include('modals.all')
        </div>
    </div>
    <script>
        let flash = document.getElementById('flash');
        if(flash){
            setTimeout(function(){
                flash.classList.add('hide')
            }, 3000)
        }
    </script>
</body>
</html>
