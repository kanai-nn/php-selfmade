<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/locales/ja.js"></script>

</head>
<body>

    <header>
        <div class="header">
            <h1>Miyonda</h1>
            <form method="POST" action="{{ route('logout') }}">
                 @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>

    </header>

    

    <main>

        @yield('content')

    </main>

    <footer>
        <div class="footer">
            <p>&copy; 2025 IGNIS GATE Miyonda</p>
        </div>
    </footer>

</body>
</html>
