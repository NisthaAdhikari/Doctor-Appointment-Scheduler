<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <link href="{{asset("loginPageCss/login.css")}}" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
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

    <link rel="stylesheet" href="{{asset('typeahead/typeahead.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
    <script src="{{ asset('typeahead/bootstrap3-typeahead.min.js') }}"></script>

    <style>

        body{
            background-color: #e4ddf0;
        }
        .navbar-inverse {
            background-color: #559CC8;
            border-color: #080808;
            box-sizing: border-box;
        }

        .navbar-inverse .navbar-brand {
            color: #BCF3FF;
            font-family: cursive;
            font-weight: 700;

        }

        .button {
            background-color: #ffe192;
            border: none;
            color: white;
            padding: 20px;
            display: inline;
            border-radius: 50%;
            margin: 4px 2px;
            display: inline;
        }


        .button:hover{

            background-color: orange;

        }

        ul{
            overflow:hidden;
        }
        li{
            display:inline-block;
        }

        .navBtn{
            border: .0625em solid white;
            border-radius: .31rem;
            background: #108BD8;
            padding: .625em 1.5rem;
            margin-right: 0px;

        }


        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .inner-search {
            background: #f8cc9f none repeat scroll 0 0;
            float: left;
            width: 100%;
            margin-bottom: 10px;

        }
        .container {
            padding-right: 15px;



        }
        .tag{
            border: 1px solid #ccc;
            float: left;
            margin-bottom: 6px;
            margin-right: 6px;
            padding: 0 7px;
            color: #535353;
            font-size: 13px;
        }





    </style>

</head>



<body>
<!------ Include the above in your HEAD tag ---------->
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 50px">
    <div class="container">
        <div class="navbar-header">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{route('getLoginPage')}}" style="color: white;">Login</a>
                <a href="{{route('doctorRegistration')}}"  style="color: white;">Register as Doctor</a>
                <a href="{{route('patientRegistration')}}"  style="color: white;">Register as Patient</a>
            </div>

            <div class="myDiv">
                <a class="navbar-brand" href="{{route('index')}}" style="margin-left: 0px; font-size: 28px; font-family: Book Antiqua">
                    Doctor Appoinment Scheduler</a>


            </div>
        </div>

        <div class="hidden-xs navbar-form navbar-right">
            <form action="{{route('searched')}}" method="post" class="form-inline">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <input type="text" autocomplete="off" class="form-control typeahead" name="specialization" placeholder="Specialization" style="width: 250px; ">


                            <button type="submit" class="btn btn-danger wrn-btn my-2 my-sm-0" style="margin-right: 20px"><i class="fa fa-search"></i></button>


                            <span style="font-size: 20px; font-family: Book Antiqua; cursor:pointer; color: white; margin-top: 5px" onclick="openNav()">&#9776; Menu</span>

                        </div>
                    </div>
                </div>
            </form>



        </div>

        <!--/.navbar-collapse -->

    </div>
</nav>

<div style="margin-top: 100px">
@if($getDoc)
    @foreach($getDoc as $t)

            <div class="box" style="margin-left: 150px; width: 990px">
                <div class="box-body" style="margin-top: 10px">
                    <div>
                        <div class="row" id="{{$t->id}}" data-text="{{$t->name}}">

                            <div class="col-md-4">

                                <div style="margin-left: 100px">

                                    <div class="media-left pr-12">

                                        <img src="{{ (isset($t) && $t->image)? asset('lib/images/'.$t->image): asset('publicimage/profileImage.png')}}" alt="IMage" style="width: 160px; height: 160px">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media-body">

                                    <h4 class="media-heading">
                                        <a href>Dr. {{$t->name}}</a></h4>
                                    <a style="font-size: 14px">
                                        {{isset($t->specialization)?$t->specialization:""}}, {{isset($t->experience)?$t->experience: ""}} years of experience

                                    </a>
                                    <br>
                                    <div class="specialization mt-10">
                                        <br>
                                        <div class="widget mb-5">
                                            <div class="tags">
                                                <div class="tag">

                                                    {{$t->specialization}} </div>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>


                                    <h5 class="media-heading mt-10 clinic-title">
                                        <a href>{{(isset($t->clinic))? $t->clinic:"" }}</a>                </h5>

                                    <div class="dr-service">
                                        <p style="color: grey; font-size: 12px;">
                                            {{(isset($t->clinicAddress))? $t->clinicAddress:"" }}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-3">
                                <a href="{{route('bookingInfo',$t->id)}}" class="btn btn-primary" style="float: right">Book appointment</a></span>

                                <!-- booking slots will be loaded here -->


                            </div>



                        </div>
                        <br>
                        <hr>


                    </div>

                </div>
            </div>
    @endforeach

@endif

    @if(count($getDoc)==0)
        <div class="box" style="margin-left: 150px; width: 990px">
            <div class="box-body" style="margin-top: 10px">
                <div>
                    <div class="row">

                        <div class="col-md-4" style="color: grey;">
                            <div style="font-size:12px; margin-top:15px; font-weight: 600; color:#888">
                                <i class="fa fa-fw fa-sticky-note" style="font-size:19px;margin-right:5px;"></i>
                                No doctors available.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
</body>
<script>
    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({

        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }

</script>
</html>


