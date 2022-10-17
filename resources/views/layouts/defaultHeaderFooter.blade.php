<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Seo --}}
    <meta name="description" content="{{ $meta_desc }}" />
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOEW">
    <meta name="author" content="" />
    <link rel="canonical" href="{{ $url_canonical }}" />

    <meta property="og:site_name" content="http://localhost:8080/mn-shop-laravel/" />
    <meta property="og:description" content="{{ $meta_desc }}" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:url" content="{{ $url_canonical }}" />
    <meta property="og:type" content="website" />
    {{-- Seo --}}
    <title>{{ $meta_title }}</title>

    <link rel="stylesheet" href="{{ URL::to('public/frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/jquery-3.6.0.js') }}">

    <link rel="stylesheet" href="{{ URL::to('public/frontend/fonts/fontawesome-free-6.0.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/bases.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/header.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/mobileMenu.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/formUser.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/contact.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/productpage.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/frontend/css/detailsProductPage.css') }}">

</head>

<body>
    <div>
        @include('layouts.header')
        @yield('content')


        @include('layouts.footer')
    </div>

    <script src="{{ URL::to('public/frontend/js/scrollHeaderEvent.js') }}"></script>
    <script src="{{ URL::to('public/frontend/js/clickSearchEvent.js') }}"></script>
    <script src="{{ URL::to('public/frontend/js/mobileMenu.js') }}"></script>
    <script src="{{ URL::to('public/frontend/js/formUser.js') }}"></script>
    <script src="{{ URL::to('public/frontend/js/productDetails.js') }}"></script>

    <script src="{{ URL::to('public/frontend/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="HVQDlTPq"></script>
    @stack('scripts')
</body>

</html>
