@extends('doctorProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>  Schedule
            <a class="btn btn-info" style="margin-left: 950px" data-toggle="modal" data-target="#myModal">Add Schedule</a>
        </h1>


        <div class="box box-primary">

            <div class="box-body box-profile">

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Schedule</h4>
                            </div>
                            <div class="modal-body" style="height:160px">
                                <form action="{{route('saveSchedule',$users->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Schedule:</label>
                                            <select name="start" class="start">
                                                @foreach($startSchedules as $start)
                                                    <option value="{{ $start->startTime }}">{{ $start->startTime }}</option>
                                                @endforeach
                                            </select>
                                            <select name="end" class="end">
                                                @foreach($endSchedules as $end)
                                                    <option value="{{ $end->endTime }}">{{ $end->endTime }}</option>
                                                @endforeach
                                            </select>
                                            <input type="date" value="" id="date" name="date">
                                        </div>

                                            <div class="form-group">
                                                <label>Availability:</label>
                                                <input type="checkbox" id="isAvailable" name="isAvailable" checked> Yes
                                            </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-info" type="submit"><i class="fa fa-upload"> Save</i></button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>


                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                <div id="appointment-grid-others" class="grid-view">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr>
                            <th class="text-left"><a class="sort-link">Date</a></th>
                            <th class="text-left"><a class="sort-link">Start Time(24-hr format)</a></th>
                            <th class="text-left"><a class="sort-link">End Time(24-hr format)</a></th>
                            <th class="button-column"><a class="sort-link">Action</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($allSchedules)
                            @foreach($allSchedules as $key=>$for)
                                <tr class="schedule_{{$for->id}}">
                                    <td>{{$key+1}}</td>
                                    <td id="date_{{$for->date}}">{{$for->date}}
                                    </td>

                                    <td id="date_{{$for->startTime}}">{{$for->startTime}}<br>
                                    </td>
                                    <td id="date_{{$for->endTime}}">
                                        {{$for->endTime}}
                                    </td>
                                    <td>
                                            <a title="Edit" href="{{route('editSchedule',[$users->id, $for->id])}}" class="btn btn-small btn-primary btn-xs" style="width: 92px">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                            </a>

                                            <a title="Delete" href="{{route('deleteSchedule',[$users->id, $for->id])}}" class="btn btn-small btn-danger btn-xs" style="width: 92px">
                                                    <i class="fa fa-fw fa-close"></i> Delete
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{$allSchedules->links()}}
                    <div class="row">
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection