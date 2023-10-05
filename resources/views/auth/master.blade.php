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
    <style>
        .transparent-card {
            background-color: rgba(255, 255, 255, 0.9); /* Ubah angka 0.8 sesuai dengan tingkat transparansi yang Anda inginkan */
            padding: 20px; /* Sesuaikan sesuai kebutuhan Anda */
            border-radius: 10px; /* Atur border-radius sesuai kebutuhan Anda */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk memberikan kedalaman */
            z-index: 1; /* Pastikan kartu tetap berada di atas latar belakang gambar */
        }
    </style>
</head>

<body>
    <div class="wrapper">        
        <div class="main" style="background-image: url('icon/background-cost.png');background-position: center;
        background-repeat: no-repeat; background-size: cover;">           
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
