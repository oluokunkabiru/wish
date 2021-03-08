<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KOADIT - @yield('title')</title>
    @include('users.customers.layout.style')
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('users.customers.layout.navbar')
            <div class="main-content">

            @yield('content')

            </div>

@include('users.customers.layout.footer')
        </div>
    </div>


    @include('users.customers.layout.script')
</body>
</html>

