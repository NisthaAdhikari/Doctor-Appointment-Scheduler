@extends('userProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>My Appointments</h1>
    </section>


    <div class="col-md-12">


        <div class="box box-primary">

            <div class="box-body box-profile">
                <!-- thumb listing -->

                <div id="appointment-grid" class="grid-view">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr>
                            <th class="text-left"><a class="sort-link" >Scheduled on</a></th>
                            <th class="text-left">
                                <a class="sort-link" >Information</a></th>
                            <th class="text-left" id="appointment-grid-others_c4">
                                <a class="sort-link" >Status</a></th>
                            <th class="text-left" >
                                <a class="sort-link" >Created At</a></th>
                            <th class="button-column"><a class="sort-link" >Action</a></th></tr>
                        {{--<tr class="filters">--}}
                        {{--<td width="20px">&nbsp;</td><td>&nbsp;</td><td width="160px"><div class="has-feedback"><select class="select2-status select2-hidden-accessible" style="width:100%" name="Appointment[status]" id="Appointment_status" tabindex="-1" aria-hidden="true">--}}
                        {{--<option value="-1" selected="selected">-All-</option>--}}
                        {{--<option value="0">Pending</option>--}}
                        {{--<option value="1">Confirmed</option>--}}
                        {{--<option value="2">Cancelled</option>--}}
                        {{--<option value="4">Archived</option>--}}
                        {{--</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Appointment_status-container"><span class="select2-selection__rendered" id="select2-Appointment_status-container" title="-All-">-All-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class=""></span> </div></td><td width="160px">&nbsp;</td><td width="90px">&nbsp;</td></tr>--}}
                        </thead>
                        <tbody>
                        @if($forMe)
                            @foreach($forMe as $for)
                                <tr class="odd">
                                    <td><div class="date_day">
                                            <h4 >{{$for->appointmentTime}}</h4>
                                            <div class="date">
                                                {{--<h2>01</h2>--}}
                                                <p class="month">{{$for->appointmentDate}}</p>
                                                {{--<p class="time">04:00 PM</p>--}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>Dr. {{$for->name}}
                                        {{--@if($for->clinic)--}}
                                            {{--Clinic:--}}
                                            {{--<a>{{$for->clinic}}</a>--}}
                                        {{--@endif--}}
                                        <br>Appointment No: {{$for->appointmentNo}}<br>
                                        <div class="color-green font-13 mt-5"> <i class="fa fa-user"></i> Patient: {{$for->patientName}}
                                        </div>
                                    </td>
                                    <td>
                                        <small class="label badge bg-green">Confirmed</small>
                                    </td>
                                    <td>{{$for->appointmentMade}}
                                    </td>
                                    <td>
                                        {{--<div class="action">--}}
                                            {{--<a title="View" href="/patient/appointment/view?id=3543">--}}
                                                {{--<div class="btn btn-small btn-primary btn-xs" style="width: 92px">--}}
                                                    {{--<i class="fa fa-search"></i> View--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}

                                        <div class="action mt-5">
                                            <a title="Cancel" href="{{route('cancelAppointment',[$for->id, $users->id])}}">
                                                <div class="btn btn-small btn-warning btn-xs" style="width: 140px">
                                                    <i class="fa fa-fw fa-close"></i> Cancel Appointment
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No record found</p>
                        @endif
                        </tbody>
                    </table>
                    {{--<div style="padding: 15px">No record found.--}}
                        <div style="font-size:12px; margin-top:15px; font-weight: 600; color:#888">
                            <i class="fa fa-fw fa-building-o" style="font-size:19px;margin-right:5px;"></i>
                            You can book Appointment to your preferred doctor from <a href="{{route('book')}}" target="_blank">DoctorSchedule </a>
                        </div>

                    </div><div class="keys" style="display:none" title="/patient/appointment"></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>



        <h3>
            Appointments Booked for Others
        </h3>
        <div class="box box-primary">

            <div class="box-body box-profile">
                <div id="appointment-grid-other" class="grid-view">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="text-left"><a class="sort-link" >Scheduled on</a></th><th class="text-left">
                                <a class="sort-link" >Information</a></th>
                            <th class="text-left" >
                                <a class="sort-link" >Status</a></th>
                            <th class="text-left" >
                                <a class="sort-link" >Created At</a></th>
                            <th class="button-column"><a class="sort-link" >Action</a></th></tr>
                        {{--<tr class="filters">--}}
                            {{--<td width="20px">&nbsp;</td><td>&nbsp;</td><td width="160px"><div class="has-feedback"><select class="select2-status select2-hidden-accessible" style="width:100%" name="Appointment[status]" id="Appointment_status" tabindex="-1" aria-hidden="true">--}}
                                        {{--<option value="-1" selected="selected">-All-</option>--}}
                                        {{--<option value="0">Pending</option>--}}
                                        {{--<option value="1">Confirmed</option>--}}
                                        {{--<option value="2">Cancelled</option>--}}
                                        {{--<option value="4">Archived</option>--}}
                                    {{--</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Appointment_status-container"><span class="select2-selection__rendered" id="select2-Appointment_status-container" title="-All-">-All-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class=""></span> </div></td><td width="160px">&nbsp;</td><td width="90px">&nbsp;</td></tr>--}}
                        </thead>
                        <tbody>
                        @if($forOthers)
                            @foreach($forOthers as $for)
                        <tr class="odd">
                            <td><div class="date_day">
                                    <h4 >{{$for->appointmentTime}}</h4>
                                    <div class="date">
                                        {{--<h2>01</h2>--}}
                                        <p class="month">{{$for->appointmentDate}}</p>
                                        {{--<p class="time">04:00 PM</p>--}}
                                    </div>
                                </div>
                            </td>
                            <td>Dr. {{$for->name}}
                                {{--@if($for->clinic)--}}
                                {{--Clinic:--}}
                                {{--<a>{{$for->clinic}}</a>--}}
                                {{--@endif--}}
                                <br>Appointment No: {{$for->appointmentNo}}<br>
                                <div class="color-green font-13 mt-5"> <i class="fa fa-user"></i> Patient: {{$for->patientName}}
                                </div>
                            </td>
                            <td>
                                <small class="label badge bg-green">Confirmed</small>
                            </td>
                            <td>{{$for->appointmentDate}}<br>{{$for->appointmentTime}}
                            </td>
                            <td>
                                <div class="action">
                                    {{--<a title="View" href="/patient/appointment/view?id=3543">--}}
                                        {{--<div class="btn btn-small btn-primary btn-xs" style="width: 92px">--}}
                                            {{--<i class="fa fa-search"></i> View--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                </div>

                                <div class="action mt-5">
                                    <a title="Cancel" href="{{route('cancelAppointment',[$for->id,$users->id])}}">
                                        <div class="btn btn-small btn-warning btn-xs" style="width: 140px">
                                            <i class="fa fa-fw fa-close"></i> Cancel Appointment
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                            @else
                        <p>No record found</p>
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6"></div>


                </div>

            </div>
        </div>

    </div>




    @endsection
