<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ !empty($title) ? $title : 'Livre D\'or'  }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    @yield('style')
</head>
<body>
    @yield('header')
    
    @yield('content')

    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>
    @yield('script')
    
</body>
</html>