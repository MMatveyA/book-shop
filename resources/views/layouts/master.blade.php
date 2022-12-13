<!doctype html>
<html>
    <head>
        <!-- required meta atgs -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- bootsrapcss -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <!-- bootstrapjs -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>


        <title>@yield('title') || Book shop</title>
    </head>
    <body>
        <nav>
            @include('layouts.nav')
        </nav>

        <main class="container">
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </body>
</html>
