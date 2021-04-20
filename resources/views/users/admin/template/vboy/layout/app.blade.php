
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    @include("users.admin.template.$theme->name.layout.style")
    @yield('externalcss')
    @yield('style')
</head>
<body  id="b" onclick="enableAutoplay()">
    @include("users.admin.template.$theme->name.layout.header")
    @yield('content')
    @include('users.admin.template.comments')
    @include("users.admin.template.$theme->name.layout.footer")
    @include("users.admin.template.$theme->name.layout.script")
    @yield('externaljs')
    @yield('script')
</body>
</html>
