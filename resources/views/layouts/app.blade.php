<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sadesha {{isset($title) ? '- '. $title : ''}}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet'">
    <link rel="stylesheet" href="{{asset('theme/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/meanmenu/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/themesaller-forms.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/notika-custom-icon.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/bootstrap-select/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/datapicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/wave/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/dialog/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/dialog/dialog.css')}}">
    <script src="{{asset('theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>    
    <link rel="stylesheet" href="{{asset('theme/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('theme/css/wave/button.css')}}"> -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body>
    @include('layouts.header')
    
    <!-- Start Sale Statistic area-->
    
        @yield('content')
    
    <!-- End Realtime sts area-->
    @include('layouts.footer')
</body>

</html>