<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    <div class="container">

        <div id="main" class="row">
            @include('includes.notification')
            @yield('content')

        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>

    @include('includes.js')
</body>
</html>