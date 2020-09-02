<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/structure.css') }}" rel="stylesheet">
</head>
<body>



    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            {{-- <div class="container"> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('isadmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Books</a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.orders', Auth::user()->id)}}">My Orders</a>
                        </li>
                        @can('isadmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('orders.index')}}">All Orders</a>
                        </li>
                        @endcan
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coming soon</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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
            {{-- </div> --}}
        </nav>
        <main class="py-4">
            {{-- display success message --}}
            @if (session()->has('message'))
                <div id="toast-container" class="toast-top-right">
                    <div class="toast toast-success" aria-live="polite" style="display: block;">
                        <div class="toast-message">{{session('message')}}</div>
                    </div>
                </div>
            @endif
            {{-- display error message --}}
            @if (session()->has('error'))
                <div id="toast-container" class="toast-top-right">
                    <div class="toast toast-error" aria-live="assertive" style="display: block;">
                        <div class="toast-message">
                            {{session('error')}}
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>
    <script src="{{ asset('js/datatables.min.js') }}" ></script>
    <script>
        //alert('it should work');
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace( 'editor1' );

        $(document).ready(function () {
            $.noConflict();
            $('#example').dataTable({

                columnDefs: [{
                orderable: false,
                className: 'select-checkbox select-checkbox-all',
                targets: 0
                }],
                select: {
                style: 'multi',
                selector: 'td:first-child'
                }
            });
            });
    </script>
</body>
</html>
