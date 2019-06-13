@extends('doctorProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>All Appointments</h1>
    </section>


    <div class="box box-primary">

        <div class="box-body box-profile">
            <div id="appointment-grid-others" class="grid-view">
                <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th class="text-left"><a class="sort-link">Appointment Details</a></th>
                        <th class="text-left"><a class="sort-link">Appointment No</a></th>
                        <th class="text-left">
                            <a class="sort-link">Patient Details</a>
                        </th>

                        <th class="button-column"><a class="sort-link">Disease description</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($app)
                        @foreach($app as $for)
                            <tr class="odd">
                                <td><div class="date_day">
                                        <h4>{{$for->appointmentDay}}</h4>
                                        <div class="date">
                                            {{$for->appointmentDate}}

                                            <p class="time">{{$for->appointmentTime}}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    {{$for->appointmentNo}}
                                </td>
                                <td>
                                    {{$for->patientName}}<br>{{$for->mobile}}
                                    @if(in_array($for->patientName,$patients))
                                        @if(in_array($for->mobile,$mobiles))

                                        <a title="View patient details" href="{{route('viewPatientDetails',[$users->id,$for->patientName])}}" class="pull-right">
                                            <div class="btn btn-small btn-success btn-xs" style="width: 92px">
                                                <i class="fa fa-fw fa-question"></i> View details
                                            </div>
                                        </a>

                                        @endif
                                        @endif
                                    {{--<a href="" data-toggle="modal" data-target="#myModal">{{$for->patientName}}<br>{{$for->mobile}}</a>--}}

                                </td>
                                <td>
                                    {{$for->diseaseDescription}}
                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$app->links()}}

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6"></div>


                </div>

            </div>
        </div>

    </div>


    @endsection