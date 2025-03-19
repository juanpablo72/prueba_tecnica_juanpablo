<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            @auth
                <span class="navbar-text">
                    Hola {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </span>
            @endauth
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
