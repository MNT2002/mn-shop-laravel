<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title_page')
    <title>MN Shop</title>
    @show
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

    @stack('scripts')
</body>

</html>
