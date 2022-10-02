<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MN Shop</title>
  <link rel="stylesheet" href="{{('public/frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/jquery-3.6.0.js')}}">

  <link rel="stylesheet" href="{{('public/frontend/fonts/fontawesome-free-6.0.0-web/css/all.min.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/bases.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/header.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/mobileMenu.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/formUser.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/contact.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/footer.css')}}">
</head>

<body>
  <div>
    @include('layouts.header')

    @yield('content')
    
    @include('layouts.contact')
    @include('layouts.footer')
  </div>

  <script src="{{('public/frontend/js/scrollHeaderEvent.js')}}"></script>
  <script src="{{('public/frontend/js/clickSearchEvent.js')}}"></script>
  <script src="{{('public/frontend/js/mobileMenu.js')}}"></script>
  <script src="{{('public/frontend/js/formUser.js')}}"></script>
</body>

</html>