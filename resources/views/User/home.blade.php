<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
    <script src="{{ asset('typeahead/bootstrap3-typeahead.min.js') }}"></script>


    <style>

        *{
            font-family: "Comic Sans MS";
        }


.typeahead{
    margin-left: 90px;
}

        .navbar-inverse {
            background-color: #559CC8;
            border-color: #080808;
            box-sizing: border-box;
        }

        .navbar-inverse .navbar-brand {
            color: #BCF3FF;
            font-family: Courier;
            font-weight: 700;
        }

        .images {

            margin: 0px;
            padding: 0px;
            text-shadow: 0 3px 3px rgba(0,0,0,.15);
            letter-spacing: -1px;

            width:200px;
        }
        #content {
            display: block;
            margin: 0px;
            padding: 0px;
            position: relative;
            top: 90px;
            height: auto;

            overflow-y: hidden;
            overflow-x:auto;
            word-wrap:normal;
            white-space:nowrap;
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


    </style>


</head>

<body>


<!------ Include the above in your HEAD tag ---------->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{route('getLoginPage')}}" style="color: white;">Login</a>
                <a href="{{route('doctorRegistration')}}"  style="color: white;">Register as Doctor</a>
                <a href="{{route('patientRegistration')}}"  style="color: white;">Register as Patient</a>
            </div>

            <div class="myDiv">
                <a class="navbar-brand" href="{{route('index')}}" style="margin-left: 0px; font-size: 28px; font-family: 'Trebuchet MS'">
                    Doctor Appoinment Scheduler</a>
            </div>
        </div>

            <div class="hidden-xs navbar-form navbar-right">
                <a href="{{route('book')}}" title="book" style="color: white; margin-right: 15px" class="navBtn">Book </a>
                <span style="font-size: 20px; font-family: Book Antiqua; cursor:pointer; color: white" onclick="openNav()">&#9776; Menu</span>
            </div>
            <!--/.navbar-collapse -->

    </div>
</nav>

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block" >
                    <h3 style="font-size:2.525em; text-shadow: 0 3px 3px rgba(0,0,0,.15); letter-spacing: -1px;
                    font-weight: 700; font-family: 'Comic Sans MS'; line-height: 1.2; margin-bottom: .5rem; color: #ffb270;">
                        Find Doctors &
                    </h3>
                    <a href="{{route('book')}}" title="book" style="color: white;"><h1 style="font-size: 3.125em; text-shadow: 0 9px 3px rgba(0,0,0,.15); letter-spacing: -1px; font-weight: 700;
                        line-height: 1.2;margin-bottom: .5rem;">
                        Book Appointment</h1></a>
                </div>


                <img src="{{ asset('publicimage/doctorzy.png') }}" class="bg" alt="Image">

            </div>

        </div>
    </div>



</section>
<section class="search-sec">

    <div class="container">
        <form action="{{route('searched')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12" >
                            <input type="text" autocomplete="off" class="form-control typeahead search-slt" name="specialization" id="specialization" placeholder="Search Doctor by Specialization" style="width: 670px; margin-left: 90px">
                            <div id="countryList">
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-3 col-sm-12" style="margin-left: 500px">
                            <button type="submit" class="btn btn-danger wrn-btn" >Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{csrf_field()}}

        <ul>
            <li>
                <a title="Cardiologist"  href="{{route('searched','Cardiologist')}}" class="">
                    <img src="{{asset('publicimage/cardio.png')}}" class="button" height="70px" style="margin-left: 120px"/><br>

                </a>
            </li>

            <li>
                <a title="Dentist"  href="{{route('searched','Dentist')}}" class="">
                    <img src="{{asset('publicimage/teeth.png')}}" class="button button5" height="70px" style="margin-left: 120px"/>

                </a>
            </li>

            <li>
                <a title="Ear specialist"  href="{{route('searched','Ear specialist')}}" class="">
                    <img src="{{asset('publicimage/ear.png')}}" class="button button5" height="70px" style="margin-left: 120px"/><br>

                </a>
            </li>

            <li>
                <a title="Gynaecologist"  href="{{route('searched','Gynaecologist')}}" class="">
                    <img src="{{asset('publicimage/gynae.png')}}" class="button button5" height="70px" style="margin-left: 120px"/><br>

                </a>
            </li>

            <li>
                <a title="Pediatrician"  href="{{route('searched','Pediatrician')}}" class="">
                    <img src="{{asset('publicimage/baby.png')}}" class="button button5" height="70px" style="margin-left: 120px"/><br>

                </a>
            </li>

        </ul>
    </div>

</section>

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



