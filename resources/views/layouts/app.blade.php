<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.header')
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    @include('inc.footer')

    @yield('scripts')

</body>
</html>
