
<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

@include('includes.header')
<div class="page">
    <div class="container">

        <div id="main" class="row">

            @yield('content')

        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
</div>
</body>
</html>
