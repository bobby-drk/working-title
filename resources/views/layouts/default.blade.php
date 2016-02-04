<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    @include('includes.js')
</head>
<body>
    @include('includes.header')
    <div class="container">

        <div id="main" class="row">

            @yield('content')

        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>

</body>
</html>