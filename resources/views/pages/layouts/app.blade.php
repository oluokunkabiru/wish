<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KOADIT-@yield('title')</title>
    @include('pages.layouts.style')
</head>
<body>
    @include('pages.layouts.header')
    @yield('content')
    @include('pages.layouts.footer')

    @include('pages.layouts.script')


</body>
</html>

