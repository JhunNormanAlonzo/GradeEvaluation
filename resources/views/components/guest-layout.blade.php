<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('Template/vendor/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('Template/css/sb-admin-2.min.css')}}">
        @stack('styles')

</head>
<body id="page-top">

    <div id="wrapper">
        @yield('content')
    </div>

    @include('sweetalert::alert')


    <script src="{{asset('Template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('Template/js/sb-admin-2.min.js')}}"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
