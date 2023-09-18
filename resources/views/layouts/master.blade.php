<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="raka">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('icon/app-icon.png') }}" type="image/x-icon">
    <title>@yield('title', 'Page Title')</title>
    @includeIf('layouts.partials.css')
    <style>
        .dt-button-collection {
            max-height: 500px !important;
            overflow-y: scroll !important;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff
        }

        .spinner {
            position: fixed;
            width: 56px;
            height: 56px;
            top: 50%;
            left: 50%;
            display: grid;
            border: 4.5px solid #0000;
            border-radius: 50%;
            border-color: #dbdcef #0000;
            animation: spinner-e04l1k 1s infinite linear;
        }

        .spinner::before,
        .spinner::after {
            content: "";
            grid-area: 1/1;
            margin: 2.2px;
            border: inherit;
            border-radius: 50%;
        }

        .spinner::before {
            border-color: #e6021d #0000;
            animation: inherit;
            animation-duration: 0.5s;
            animation-direction: reverse;
        }

        .spinner::after {
            margin: 8.9px;
        }

        @keyframes spinner-e04l1k {
            100% {
                transform: rotate(1turn);
            }
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="spinner">
        </div>
    </div>
    <div class="wrapper">
        @includeIf('layouts.partials.sidebar')
        <div class="main">
            @includeIf('layouts.partials.header')
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
