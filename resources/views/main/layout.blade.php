<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page_title')</title>
  <meta name="description" content="@yield('page_description')">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Yellow pagado">
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
    <link href="{{asset('css/redactor.css')}}" rel="stylesheet">

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
    <script>
        $(document).ready(function()
        {
            $('.redactor').redactor({
                minHeight: 200
            });
        });
    </script>
  @yield('customStyle')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="skin-blue sidebar-mini sidebar-collapse" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">
  <header class="main-header"><!-- header -->
     @include('main.header')
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('main.leftsidebar')
    </section>
    <!-- /.sidebar -->
  </aside>
     <div class="content-wrapper" style="min-height: 960px">
       <section class="content-header">
              <div class="infoDiv"><!-- display all error message -->
                @include('main.errorLog')
                @if(Session::has('message'))
                   <p class="alert alert-success fashMessage" style="z-index: 99999 !important;">
                     <a class="close" data-dismiss="alert" href="#">
                         ×
                     </a>
                     {{session::get('message')}}
                   </p>
                @endif
              </div>
         </section>
              {{--<div id="app"></div>--}}
       <section class="content">
         @yield('adminContent')
       </section>

       {{--<div class="control-sidebar-bg"></div>--}}
    </div>
      {{--<footer class="main-footer">--}}
        {{--@include('main.footer')--}}
      {{--</footer>--}}
</div>


@include('main.script')<!-- script file -->
<!-- <div class="control-sidebar-bg"></div> -->
@yield('custom_script') <!-- custom script -->
</body>
</html>
