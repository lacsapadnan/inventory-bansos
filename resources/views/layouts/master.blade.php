<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory - @yield('title')</title>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/favicon.png') }}">
    @include('includes.style')
    @stack('style')
</head>
<body>

    {{-- Preloader --}}
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

   {{-- Main Wrapper --}}
    <div id="main-wrapper">
        {{-- Navbar --}}
        @include('parts.navbar')

        {{-- Header --}}
        @include('parts.header')

        {{-- Sidebar --}}
        @include('parts.sidebar')

        {{-- Content --}}
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('parts.footer')


    {{-- Script --}}
    @include('includes.script')
    @stack('scripts')
</body>
</html>
