<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <meta name="description" content="@yield('page_description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.css">
<!--
  {{--{!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!} -->--}}
{{--{!! Html::style('css/app.css') !!}--}}
{{--{!! Html::style('css/global.css') !!}--}}
{{--{!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}--}}
{{--{!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}--}}
{{--{!! Html::style('dist/css/AdminLTE.min.css') !!}--}}
{{--{!! Html::style('dist/css/skins/_all-skins.min.css') !!}--}}
{{--{!! Html::style('bower_components/morris.js/morris.css') !!}--}}
{{--{!! Html::style('bower_components/jvectormap/jquery-jvectormap.css') !!}--}}
{{--{!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}--}}
{{--{!! Html::style('bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}--}}
{{--{!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!} -->--}}
{{----}}
{{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.css">--}}
        <!--  -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{asset('js/redactor.min.js')}}"></script>
    {{--@yield('customStyle')--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .search-form-wrapper {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            padding: 20px 15px;
            margin-top: 50px;
            background: right center no-repeat #f89d1c;
        }
        .search-form-wrapper.open {
            display: block;
        }

        .navbar-inverse {
            background-color: #53A3CD;
            border-color: #080808;
        }

        .navbar-inverse .navbar-brand {
            color: white;
        }

        /* Style the buttons */
        .br {
            border: #0a0a0a;
            color: white;
            /*outline: none;*/
            padding: 10px 16px 30px;
            background-color: #53A3CD;
            /*cursor: pointer;*/
            /*color: white;*/
        }

        /* Style the active class (and buttons on mouse-over) */
        .active, .br:hover {
            font-style: italic;
            font-weight: bolder;
            background-color: whitesmoke;
            /*color: #53A3CD;*/
        }


    </style>
</head>
<!-- header -->
        @include('doctorProfile.profileHeader')

    {{--<aside class="main-sidebar">--}}
        {{--<!-- sidebar: style can be found in sidebar.less -->--}}
        {{--<section class="sidebar" style="height: auto;">--}}
            {{--<!-- Sidebar user panel -->--}}

            {{--<!-- /.search form -->--}}
            {{--<!-- sidebar menu: : style can be found in sidebar.less -->--}}

        {{--</section>--}}
        {{--<!-- /.sidebar -->--}}
    {{--</aside>--}}
<body>
    <div class="content-wrapper" style="min-height: 100%; margin-left: 0">

        {{--<div id="app"></div>--}}
        <section class="content">
            @yield('adminContent')
        </section>

        {{--<div class="control-sidebar-bg"></div>--}}
    </div>
    <footer class="main-footer">
    @include('userProfile.profileFooter')
    </footer>

    <script>

        // Get the container element
        var btnContainer = document.getElementById("myDiv");
        // alert(btnContainer);

        // Get all buttons with class="btn" inside the container
        var btns = btnContainer.getElementsByClassName("br");

        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

    </script>

@include('main.script')<!-- script file -->
<!-- <div class="control-sidebar-bg"></div> -->
@yield('custom_script') <!-- custom script -->



</body>
</html>
