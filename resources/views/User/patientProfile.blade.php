@extends('userProfile.main')
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
                            <img src="{{ (isset($users) && $users->image)? asset('lib/images/'.$users->image):asset('publicimage/profileImage.png')  }}" alt="Image" height="120px" width="140px"><br><br>

                            <h4 style="font-weight: bolder"><a>{{$users->name}}</a></h4>

                        </div>
                        <br>
                        <ul class="list-group list-group-flush" style="text-align: left">
                            <li class="list-group-item">Gender:  <a class="pull-right">{{$users->gender}}</a></li>
                            <li class="list-group-item">Date of Birth: <a class="pull-right">{{$users->dob}}</a></li>
                        </ul>

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

                                <li class="list-group-item">Street Address:  <a class="pull-right">{{$users->streetAddress}}</a></li>
                                <li class="list-group-item">Area:  <a class="pull-right">{{$users->area}}</a></li>
                                <li class="list-group-item">City:  <a class="pull-right">{{$users->city}}</a></li>


                            </ul>

                        </div>

                </div>
            </div>

            <a class="btn btn-block btn-primary mt-10" href="{{route('editProfile',$users->id)}}"><i class="fa fa-fw fa-pencil-square-o"></i> Edit</a>
        </div>

        <div class="col-md-8">

            <div class="row">
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green" style="padding-top: 20px">
                        <div class="inner">
                            <h3>{{$app}}<sup style="font-size: 20px"></sup></h3>

                            <p style="color: white;">Upcoming Appointments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-calendar-check-o " style="margin-top: 10px"></i>
                        </div>
                        <a class="small-box-footer" href="{{route('myAppointments', $users->id)}}">More info <i class="fa fa-arrow-circle-right"></i></a>                            </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow" style="padding-top: 20px">
                        <div class="inner">
                            <h3>{{$totalReports}}</h3>
                            <p>My Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-wechat" style="margin-top: 10px"></i>
                        </div>
                        <a class="small-box-footer" href="{{route('myRepo', $users->id)}}">More info <i class="fa fa-arrow-circle-right"></i></a>                            </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="box box-info"><br>
                <div style="font-size:12px; font-weight: 600; color:#888">
                    <i class="fa fa-fw fa-building-o" style="font-size:19px;margin-right:5px;"></i>
                    You can book Appointment to your preferred doctor from <a href="{{route('book')}}" target="_blank">DoctorSchedule </a>
                </div>
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