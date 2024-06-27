<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{env('APP_NAME', 'Laravel')}}</title>
    {{--  styles  --}}
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/adaptive.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{--  fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @yield('styles')
</head>
<body>
    @yield('header', App\View\Components\PublicHeader::resolve([])->render())

{{--    TODO normal config modal window - doesnt work outside a 'section' --}}
    <x-session-messages-alert/>
{{--    <x-modal/>--}}

    @yield('content')

    @yield('footer', App\View\Components\PublicFooter::resolve([])->render())

    @yield('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('scripts/app.js') }}"></script>
</body>
</html>
