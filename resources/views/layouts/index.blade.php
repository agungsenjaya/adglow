<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
@yield('css')
</head>
<body>
    @include('layouts.header')
    <div class="min-vh-100">
        @yield('content')
    </div>
    @include('layouts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="true"></script>
@yield('js')
<script>
    $(document).on('turbolinks:load',function() {
    //infinite_scroll()
    console.log('turbolinks:load fired');
});
</script>
</body>
</html>