<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link href="{{asset("loginPageCss/login.css")}}" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('typeahead/typeahead.css')}}">
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

                            <input type="text" autocomplete="off" class="form-control typeahead" placeholder="Specialization" style="width: 250px; ">


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

<div class="container" style="margin-top: 100px; margin-right: 70px">
    <div class="row">
        <div class="col-md-9">
            @if($test)
                @foreach($test as $t)
                    <div class="box" style="margin-left: 30px; width: 1000px; height: inherit">
                        <div class="box-body" style="margin-top: 10px">
                            <div class="col-md-3">

                                <div style="margin-left: 100px">

                                    <div class="media-left pr-12">

                                        <img src="{{ (isset($t) && $t->image)? asset('lib/images/'.$t->image): asset('publicimage/profileImage.png')}}" alt="IMage" style="width: 160px; height: 160px">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-left: 70px">
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


                                    <h5 class="media-heading mt-10">
                                        <a href>{{(isset($t->clinic))? $t->clinic:"" }}</a>                </h5>

                                    <div>
                                        <p style="color: grey; font-size: 12px;">
                                            {{(isset($t->clinicAddress))? $t->clinicAddress:"" }}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="clear"></div>


                        </div></div></div></div></div>


<div class="container" style=" margin-right: 70px; ">
    <div class="row">
        <div class="col-md-9">
                    <div class="box box-info" style="margin-left: 30px; width: 1000px;">
                        <h1 style="margin-top: 5px; margin-left: 5px">Schedule</h1>
                        <hr>
                        <div class="box-body" style="">
                            <div class="box-title"></div>
                            <div style="width: 200px">
                                <!-- booking slots will be loaded here -->
                                @if(count($data)==0)

                                    <div style="font-style: italic; font-weight: bolder; font-size: 15px; color: grey; width: 300px"><i class="fa fa-sticky-note"></i>  No online booking available</div>
                               @else
                                <table class="table no-border-td text-center" style="margin-left: 100px">

                                    <thead class="text-center">
                                    <!-- week days information-->

                                        <th  >
                                            <i class="fa fa-chevron-left"></i>
                                        </th>


                                        @foreach($data as $d)
                                            <th width="100px">

                                                <div class="day">{{$d->day}}</div>

                                                <div class="date">{{$d->date}}</div>
                                            </th>
                                        @endforeach
                                        <th>
                                            <i class="fa fa-chevron-right disable"></i></th>

                                    </thead>

                                    <tbody>
                                    <!-- actual content -->
                                    <tr>
                                            <td></td>
                                        @foreach($data as $d)
                                            <td>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            {{--@for ($i = ((int)$d->startTime + 1); $i < (int)$d->endTime; $i++)--}}
                                                            @for ($i = ((int)$d->startTime); $i < (int)$d->endTime; $i++)
                                                                @for ($j = 0; $j <= 3; $j+=3)
                                                                    <?php $dte = $d->date;
                                                                    $ta = $i.':'. $j.'0';
                                                                    if($i >= 12){
                                                                        $schedule = $dte. ' ' . $ta. ' '. 'PM';
                                                                    }
                                                                    else{
                                                                        $schedule = $dte. ' ' . $ta. ' '. 'AM';
                                                                    }

                                                                    ?>
                                                                    @if($j==0)
                                                                        {{--{{dd($t->id)}}--}}

                                                                        @if(in_array($schedule,$appointments))
                                                                            <a class="btn" readonly style="background-color: #a8a8a8;margin-left: 20px; height: 30px; width: 80px; margin-top: 2px" ><strike>{{$ta}}</strike></a>
                                                                        @else

                                                                            <a class="btn btn-primary" style="height: 30px; width: 80px;margin-left: 20px; margin-top: 2px" href="{{route('bookingForm',[$t->id,$d->date,$d->day,$i,$j])}}">{{$ta}}</a>
                                                                        @endif

                                                                        {{--@endfor--}}
                                                                    @else

                                                                        @if(in_array($schedule,$appointments))
                                                                            <a class="btn" style="background-color: #a8a8a8; height: 30px; width: 80px; margin-top: 2px; margin-left: 20px" readonly><strike>{{$ta}}</strike></a>
                                                                        @else
                                                                            <a class="btn btn-primary" style="height: 30px; width: 80px; margin-left: 20px; margin-top: 2px" href="{{route('bookingForm',[$t->id,$d->date,$d->day,$i,$j])}}">{{$ta}}</a>
                                                                        @endif
                                                                    @endif

                                                                @endfor
                                                            @endfor
                                                            <?php $x = $d->date;
                                                            $y = $d->endTime.':'.'00';
                                                            if((int)$d->endTime >= 12){
                                                                $z = $x. ' ' . $y. ' '. 'PM';
                                                            }
                                                            else{
                                                                $z = $x. ' ' . $y. ' '. 'AM';
                                                            }
                                                            ?>
                                                            @if(in_array($z,$appointments))

                                                                <a class="btn btn-primary" readonly style="height: 30px;margin-left: 20px; background-color: #a8a8a8; width: 80px; margin-top: 2px"><strike>{{$y}}</strike></a>
                                                            @else
                                                                @if($y == ":00")
                                                                    <i><strong>No online booking available</strong></i>
                                                                @else
                                                                    <a class="btn btn-primary" style="height: 30px;margin-left: 20px; width: 80px; margin-top: 2px" href="{{route('bookingForm',[$t->id,$d->date,$d->day,$d->endTime])}}">{{$y}}</a>
                                                                @endif

                                                            @endif
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                                @endforeach



                                    </tr>
                                    </tbody>



                                    {{--</tfoot>--}}
                                </table>
@endif
                            </div>



                    <br>
                    <hr>
                @endforeach
            @endif
                        </div>
                    </div>
        </div>
    </div>
</div>






<script>


        //
        // $('#load-more').click(function() {
        //     $('#toggle-more').animate({width:"100px"});
        // });

        var path = "{{ route('autocomplete') }}";

        $('input.typeahead').typeahead({

            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

    $('#oncall').click(function(){
        $('.mobile').attr('style', 'visibility: visible');
    })


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


