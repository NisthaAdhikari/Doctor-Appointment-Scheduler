@extends('doctorProfile.main')
@section('adminContent')
<section class="content-header" style="margin-top: 50px">
    <h1>My Profile</h1>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-4 doctor">

            <div class="box box-solid">
                <div class="box-body">
                    {{--<div class="image">--}}
                        {{--<img src="/webassets/images/no-user.jpg" alt="image" class="">--}}
                        {{--<h4>{{$users->name}}</h4>--}}
                    {{--</div>--}}
                    {{--<div class="doctor_details">--}}
                        {{--<li>Gender <a href="#"><div class="not-set-text">Not set</div></a></li>--}}
                    <div class="card">
                        <div class="card-header text-center" style="align-self: center;">

                            <img src="{{ (isset($users) && $users->image)? asset('lib/images/'.$users->image): asset('publicimage/profileImage.png')  }}" alt="Image" height="120px" width="140px"><br><br>

                            <h4 style="font-weight: bolder"><a>{{$users->name}}</a></h4>
                            <h2>{{isset($users->shortDesc)?$users->shortDesc:""}}</h2>

                        </div>
                        <br>
                        <ul class="list-group list-group-flush" style="text-align: left">
                            <li class="list-group-item">Specialization:  <a class="pull-right">{{$users->specialization}}</a></li>
                            <li class="list-group-item">Experience: <a class="pull-right">{{$users->experience}}</a></li>

                    </div>
                </div>
            </div>

            <div class="box box-solid">
                <div class="box-body">

                        <div class="card">
                            <div class="card-header text-center" style="align-self: center; text-decoration: underline">
                                Contact Details

                            </div>
                            <br>
                            <ul class="list-group list-group-flush" style="text-align: left">
                                <li class="list-group-item">Email: <a class="pull-right">{{$users->email}}</a></li>
                                <li class="list-group-item">Phone Number: <a class="pull-right">{{$users->mobile}}</a></li>
                                <li class="list-group-item">Clinic Name:  <a class="pull-right">{{(isset($users))? $users->clinic:"" }}</a></li>
                                <li class="list-group-item">Clinic Address:  <a class="pull-right">{{(isset($users))? $users->clinicAddress:"" }}</a></li>


                            </ul>

                        </div>

                </div>
            </div>

            <a class="btn btn-block btn-primary mt-10" href="{{route('editDocProfile',$users->id)}}"><i class="fa fa-fw fa-pencil-square-o"></i> Edit</a>
        </div>

        <div class="col-md-8">

            <div class="row">
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" style="padding-top: 20px">
                        <div class="inner">
                            <h3>{{$app}}<sup style="font-size: 20px"></sup></h3>
                            <p style="color: white;">View Appointments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-calendar-check-o " style="margin-top: 10px"></i>
                        </div>
                        <a class="small-box-footer" href="{{route('allAppointments', $users->id)}}">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6" >
                    <!-- small box -->
                    <div class="small-box bg-teal" style="padding-top: 20px;">
                        <div class="inner">
                            <h3>Schedules</h3>
                            <p style="color: white;">View Schedules</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-clock-o" style="margin-top: 10px"></i>
                        </div>
                        <a class="small-box-footer" href="{{route('schedule', $users->id)}}">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="box box-info">

                {{--<div class="box-header with-border">--}}
                    {{--<h3 class="box-title">Visiting Clinic/Doctor</h3>--}}
                {{--</div>--}}

                <div class="box-body">


                </div>
                <!-- /.box-body -->


            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


 @endsection