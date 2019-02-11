
<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

@include('includes.header')
<div class="page">
    <div class="container">

        <div class="page-title">
            <h1>@yield('title')</h1>
        </div>

        @yield('content')

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
</div>
</body>
</html>
