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
      <style>
         body {
         color: #404E67;
         background: #F5F7FA;
         font-family: 'Open Sans', sans-serif;
         }
         .table-wrapper {
         width: 700px;
         margin: 30px auto;
         background: #fff;
         padding: 20px;	
         box-shadow: 0 1px 1px rgba(0,0,0,.05);
         }
         .table-title {
         padding-bottom: 10px;
         margin: 0 0 10px;
         }
         .table-title h2 {
         margin: 6px 0 0;
         font-size: 22px;
         }
         .table-title .add-new {
         float: right;
         height: 30px;
         font-weight: bold;
         font-size: 12px;
         text-shadow: none;
         min-width: 100px;
         border-radius: 50px;
         line-height: 13px;
         }
         .table-title .add-new i {
         margin-right: 4px;
         }
         table.table {
         table-layout: fixed;
         }
         table.table tr th, table.table tr td {
         border-color: #e9e9e9;
         }
         table.table th i {
         font-size: 13px;
         margin: 0 5px;
         cursor: pointer;
         }
         table.table th:last-child {
         width: 100px;
         }
         table.table td a {
         cursor: pointer;
         display: inline-block;
         margin: 0 5px;
         min-width: 24px;
         }    
         table.table td a.add {
         color: #27C46B;
         }
         table.table td a.edit {
         color: #FFC107;
         }
         table.table td a.delete {
         color: #E34724;
         }
         table.table td i {
         font-size: 19px;
         }
         table.table td a.add i {
         font-size: 24px;
         margin-right: -1px;
         position: relative;
         top: 3px;
         }    
         table.table .form-control {
         height: 32px;
         line-height: 32px;
         box-shadow: none;
         border-radius: 2px;
         }
         table.table .form-control.error {
         border-color: #f50000;
         }
         table.table td .add {
         display: none;
         }
      </style>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <a class="navbar-brand" href="{{ url('/') }}">
               Cricket Match DashBoard
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                     <li><a class="navbar-brand" href="{{ route('admin.teams.index') }}">Teams</a></li>
                     <li><a class="navbar-brand" href="{{ route('admin.players.index') }}">Players</a></li>
                     <li><a class="navbar-brand" href="{{ route('admin.matches.index') }}">Matches</a></li>
                     <li><a class="navbar-brand" href="{{ route('admin.results.create') }}">Results</a></li>
                     @guest
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                     </li>
                     @else
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </div>
                     </li>
                     @endguest
                  </ul>
               </div>
            </div>
         </nav>
         <main class="py-4">
            @yield('content')
         </main>
      </div>
   </body>
</html>