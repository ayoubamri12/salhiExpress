<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav>
        <!-- Your navigation bar can go here -->
    </nav>
    <div class="container">
        @yield('content') <!-- This is where the content of your views will be injected -->
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
