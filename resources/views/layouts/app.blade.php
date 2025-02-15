<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'CreativeHub')</title>

        <!-- Styles -->
        <link href="{{ url('css/milligram.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/app.css') }}" rel="stylesheet">
        @yield('styles')

        <!-- Scripts -->
        <script type="text/javascript">
            // Fix for Firefox autofocus CSS bug
            // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
        </script>
        <script type="text/javascript" src={{ url('js/app.js') }} defer> </script>
        @yield('scripts')
    </head>
    <body>
        <main>
            <header>
                <h1><a href="{{ url('/home') }}">CreativeHub</a></h1>
                <span id="search_area">
                    <form method="GET" action="{{ route('search') }}" id ="search_area">
                        @isset($search)
                        <input type="text" name="search" id="search" value="{{ $search }}" placeholder="Search..">
                        @endisset
                        @empty($search)
                        <input type="text" name="search" id="search" placeholder="Search..">
                        @endempty
                    </form>
                </span>
                <span id="main_buttons">
                    <a class="button" href="{{ url('/tags') }}"> Tags </a>
                    <a class="button" href="{{ url('/users') }}"> Users </a>
                </span>
                <span id="user_buttons">
                    @if (Auth::check())
                    <a class="button" href="{{ url('/logout') }}"> Logout </a>
                    <a class="button" href="{{ route('profile', ['id' => Auth::user()->getAuthIdentifier()] )}}"> {{ Auth::user()->username }} </a>
                    @endif
                    @if (!Auth::check())
                    <a class="button" href="{{ url('/login') }}"> Login </a>
                    @endif
                </span>
            </header>
            <section id="content">
                <div class="row">
                    <div class="sidebar">
                        @yield('sidebarleft')
                    </div>
                    <div class="main-content">
                        @yield('content')
                    </div>
                    <div class="sidebar">
                        @yield('sidebarright')
                    </div>
                </div>
            </section>

            <footer id="footer">
                <a href="{{ url('/mainfeatures') }}"> Main Features </a>
                <a href="{{ url('/aboutus') }}"> About Us </a>
                <a href="{{ url('/contactus') }}"> Contact Us </a>
                <p> CreativeHub &copy; 2023 </p>
            </footer>
        </main>
    </body>
</html>
