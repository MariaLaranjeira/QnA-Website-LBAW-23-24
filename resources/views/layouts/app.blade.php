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
                <section id="main_buttons">
                    <a class="button" href="{{ url('/tags') }}"> Tags </a>
                    <a class="button" href="{{ url('/users') }}"> Users </a>
                </section>
                <form method="POST" action="{{ route('search') }}">
                    {{ csrf_field() }}
                    <input type="text" name="search" id="search" value="{{ old('search') }}" placeholder="Search..">
                </form>
                <section id="user_buttons">
                    @if (Auth::check())
                    <a class="button" href="{{ url('/logout') }}"> Logout </a>
                    <a class="button" href="{{ url('/profile') }}"> {{ Auth::user()->username }} </a>
                    @endif
                    @if (!Auth::check())
                    <a class="button" href="{{ url('/login') }}"> Login </a>
                    @endif
                </section>
            </header>
            <section id="content">
                @yield('content')
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
