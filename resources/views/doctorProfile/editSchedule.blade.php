@extends('doctorProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px; margin-left: 350px">
        <h1>  Edit Schedule
        </h1>
        <br>


        <div class="box box-primary" style="width: 600px; height: 400px;">
            <div class="box-body box-profile">
                <form action="{{route('updateSchedule',[$users->id,$doctorSchedule->id])}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div>
                        <div class="form-group">
                            <label>Start Time (24 hr format):</label>
                            <select name="start" class="form-control">
                                @foreach($startSchedules as $start)
                                    <option value="{{ $start->startTime }}" @if($doctorSchedule->startTime == $start->startTime) {{ 'selected' }} @endif>{{ $start->startTime }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>End Time (24 hr format):</label>
                            <select name="end" class="form-control">
                                @foreach($endSchedules as $end)
                                    <option value="{{ $end->endTime }}" @if($doctorSchedule->endTime == $end->endTime) {{ 'selected' }} @endif>{{ $end->endTime }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>On Date:</label>
                            <input type="date" class=" form-control datepicker" id="date" name="date" value="{{$doctorSchedule->date}}">
                        </div>


                        <div class="form-group">
                            <label>Availability:</label>
                            <input type="checkbox" id="isAvailable" name="isAvailable" checked> Yes
                        </div>


                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"><i class="fa fa-upload"> Update</i></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>




    </section>



    @endsection