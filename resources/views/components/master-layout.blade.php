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
        <link rel="stylesheet" href="{{asset('Template/vendor/datatables/dataTables.bootstrap4.min.css')}}">
        <link href="" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        @stack('styles')
</head>
<body id="page-top">

    <div id="wrapper">
        <x-sidebar></x-sidebar>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-navbar></x-navbar>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        @yield('title')
                    </div>

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <x-scroll-to-top-button></x-scroll-to-top-button>

    @include('sweetalert::alert')



    <script src="{{asset('Template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('Template/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('Template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Template/js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('Template/vendor/select2/select2.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
