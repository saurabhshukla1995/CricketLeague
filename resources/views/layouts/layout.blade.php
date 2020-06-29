<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Cricket App') }}</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
      .top-right{
             margin-left: 70%;
      }
      </style>
   </head>
   <body>
      <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @if (Route::has('login'))
            <div class="top-right links">
               @auth
               <a href="{{ url('/home') }}">Home</a>
               @else
               <a class="navbar-brand" href="{{ url('teams') }}">Teams</a>
               <a class="navbar-brand" href="{{ url('players') }}">Players</a>
               <a class="navbar-brand" href="{{ url('matches') }}">Matches</a>
               <a href="{{ route('login') }}">Login</a>
               @endauth
            </div>
            @endif
         </nav>
         <main class="py-4">
            @yield('content')
         </main>
      </div>
   </body>
</html>