<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="farhan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://img.icons8.com/color/96/company.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets_old/img/logoiccsnew.svg') }}" type="image/x-icon">
    <title>@yield('title', 'Page Title')</title>
    @includeIf('layouts.partials.css')
</head>

<body>
    <div class="wrapper">        
        <div class="main">           
            <main class="content px-4 pt-2">
                @includeif('layouts.partials.sweetalert')
                @yield('content')
            </main>
            @includeif('layouts.partials.footer')
        </div>
    </div>
    @includeIf('layouts.partials.js')
</body>
</html>
