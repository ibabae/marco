<!DOCTYPE HTML>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <title>مدیریت {{Setting('title')}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="old-admin-assets/imgs/theme/favicon.svg">
        <!-- Template CSS -->
        <link href="{{asset('old-admin-assets/css/main.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/css/marco.css')}}">
        <style>
            body{
                font-family:'Marco';
            }
        </style>
        <link href="{{asset('old-admin-assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

        @yield('header')
    </head>

    <body>
        <div class="screen-overlay"></div>
        @include('old-admin.layout.aside')
        <main class="main-wrap">
            @include('old-admin.layout.header')
            <section class="content-main">
                @yield('main')
            </section>
            @include('old-admin.layout.footer')
        </main>
        <script src="{{asset('old-admin-assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('old-admin-assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('old-admin-assets/js/vendors/select2.min.js')}}"></script>
        <script src="{{asset('old-admin-assets/js/vendors/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('old-admin-assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
        <script src="{{asset('old-admin-assets/js/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('old-admin-assets/js/custom-chart.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            @if(Session::has('message'))
                var type = "{{Session::get('type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info("{{Session::get('message')}}");
                    break;
                    case 'success':
                        toastr.success("{{Session::get('message')}}");
                    break;
                    case 'warning':
                        toastr.warning("{{Session::get('message')}}");
                    break;
                    case 'danger':
                        toastr.error("{{Session::get('message')}}");
                    break;
                }
            @endif
        </script>
        @yield('footer')
    </body>
</html>
