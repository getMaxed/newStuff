<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.meta-static')
    @include('partials.meta-dynamic')
    <title>@yield('meta-title')</title>
    <meta name="description" content="@yield('meta-desc')">
    <meta name="author" content="@yield('meta-author')">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    newStuff
                    {{--{{ config('app.name', 'newStuff') }}--}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto navbar-left">
                        <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>

                            @if ($c)
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($c as $c)
                                        @if ($c->blog->count() > 0)
                                            <li><a href="{{ route('categories.show', $c->slug) }}"></a>{{ $c->name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                            {{--@if ($categories)--}}
                                {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--@foreach($categories as $category)--}}
                                    {{--@if ($category->blog->count() > 0)--}}
                                        {{--<li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>--}}
                                    {{--@endif    --}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--@endif--}}

                        </li>
                                    <li><a class="nav-link" href="{{ url('admin') }}">Admin</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
