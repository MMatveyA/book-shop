<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title') || Book shop</title>
    </head>
    <body>
        <nav>
            @include('layouts.nav')
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </body>
</html>
