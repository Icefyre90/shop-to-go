<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <title> Admin Nproject</title>
        <meta name = "description" content = "Sufee Admin - HTML5 Admin Template">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">

        <link rel = "apple-touch-icon" href = "apple-icon.png">
        <!--<link rel = "shortcut icon" href = "favicon.ico">-->
        
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/normalize.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/animate.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/bootstrap.min.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/font-awesome.min.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/themify-icons.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/flag-icon.min.css') }}" >
        <link rel = "stylesheet" href = "{{ asset('css/backend_css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('css/backend_css/lib/datatable/dataTables.bootstrap.min.css') }} ">
        <!--<link rel = "stylesheet" href = "assets/css/bootstrap-select.less"> -->
         <link rel="stylesheet" href="{{ asset('css/backend_css/lib/chosen/chosen.min.css') }}">
        <link rel = "stylesheet" href = "{{ asset('scss/style.css') }}" >
        <link href = "{{ asset('css/backend_css/lib/vector-map/jqvmap.min.css') }}" rel = "stylesheet">

        <link href = 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel = 'stylesheet' type = 'text/css'>

<!--<script type = "text/javascript" src = "https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>



        @include('layouts.adminlayout.admin_sidebar')
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            @include('layouts.adminlayout.admin_header')<br/>
            @yield('content')







            <script src="{{ asset( 'js/backend_js/vendor/jquery-2.1.4.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/popper.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/plugins.js') }}"></script>
            <script src="{{  asset('js/backend_js/main.js' )}}"></script>


            <script src="{{  asset('js/backend_js/lib/data-table/datatables.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/dataTables.buttons.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/jszip.min.js' )}}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/pdfmake.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/vfs_fonts.js' )}}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/buttons.html5.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/buttons.print.min.js' )}}"></script>
            <script src="{{ asset( 'js/backend_js/lib/data-table/buttons.colVis.min.js') }}"></script>
            <script src="{{  asset('js/backend_js/lib/data-table/datatables-init.js') }}"></script>
    </body>
</html>
