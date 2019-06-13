<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link href="{{asset("loginPageCss/login.css")}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">


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

                            <input type="text" autocomplete="off" class="form-control search-slt" name="specialization" placeholder="Specialization" style="width: 250px; ">


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

<div class="container" style="margin-top: 90px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div>
                            <h3 style="color: #53A3CD; ">Patient Registration</h3>
                        </div>
                    </div>

                    <hr>
                </div>


                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-12">

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                    </ul>
                                </div>

                                @endif

                            <form id="patient-registration-form" action="{{route('registerPatient')}}" method="post" role="form" style="display: block;">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Enter Name" required>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Enter Address" value="">--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Enter Email" required>
                                </div>


                                <div class="form-group">

                                    <input type="phone" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="patientPassword" id="patientPassword" tabindex="2" class="form-control" placeholder="Password" aria-describedby="passwordHelpBlock" required>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="patientConfirmPassword" id="patientConfirmPassword" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                    <span id='message'></span>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" tabindex="4" class="form-control btn btn-login" value="Sign Up">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <a href="{{route('getLoginPage')}}" style="background-color: lightgrey" tabindex="4" class="form-control btn">Log in</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#patientPassword, #patientConfirmPassword').on('keyup', function () {
        if ($('#patientPassword').val() == $('#patientConfirmPassword').val()) {
            $('#message').html('Passwords match').css('color', 'green');
        } else
            $('#message').html('Passwords do not match').css({"color":"red","margin-left":"15px"});
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


</body>



</html>