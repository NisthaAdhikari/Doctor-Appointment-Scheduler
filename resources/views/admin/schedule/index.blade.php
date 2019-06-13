@extends('main.layout')
@section('page_title', $page['page_title'])
@section('page_description', $page['page_description'])
@section('adminContent')
    <link href="{{ asset('uploader/jquery.plupload.queue/css/jquery.plupload.queue.css') }}" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="{{ asset('js/uploader/plupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader/plupload.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader/plupload.html4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader/jquery.plupload.queue.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>
        <strong>Schedules</strong>
    </h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="box-title"><i class="fa fa-list"></i> List of schedules</h2>
                    <p class="pull-right">
                        <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addCountry">
                            <i class="fa fa-plus">Add Schedule</i></button>
                    </p>
                    <hr size="45">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">

                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">SN</th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 200px;">Start Time(24-hour format)</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 200px;">End Time(24-hour format)</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($schedules)
                                        <?php  $count = 1;   ?>
                                        @foreach($schedules as $schedule)
                                            <tr class="schedule_{{ $schedule->id }}">
                                                <td>{{ $count ++ }}</td>

                                                <td id="startTime_{{$schedule->id}}">{{ $schedule->startTime }}</td>
                                                <td id="endTime_{{$schedule->id}}">{{ $schedule->endTime }}</td>

                                                <td>
                              	   	     <span>
                              	   	       <a href="#"  title="Edit" id="editSchedule" onclick="edit('{{ $schedule->id  }}')">
                              	   	         <i class="fa fa-fw fa-lg fa-pencil-square-o btnUpdateSchedule" data-toggle="modal" data-target="#updateCountry"></i>
                              	   	     </a>
                              	   	     </span>
                                                    <span>
                              	   	 	 	  <a href="" class="txt-color-red deleteMe"
                                                 data-url="{!! route('admin.schedule.delete', $schedule->id ) !!}" title="delete schedule" data-name="{{ $schedule->name }}" data-id = "{{ $schedule->id }}">
                              	   	          <i class="fa fa-fw fa-lg fa-trash-o deletable text-danger"> </i> </a>
                              	   	      </span>



                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <!-- /.box-body -->
                    </div>
                </div>
                <!-- Modal insert form -->
                <div id="addCountry" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><strong>Add Schedule</strong></h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route'=>'admin.schedule.store', 'name'=>'frmSchedule', 'method'=>'post', 'files'=>true]) !!}
                                @include('admin.schedule._form')
                                <p class="pull-right">
                                    {!! Form::submit('CREATE', ['class'=>'btn btn-success']) !!}
                                    <button class="btn btn-danger" onclick="window.history.go(0); return false;">CANCEL</button>
                                </p>
                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- modal -->
                <div class="row">
                    <div id="modalScheduleFrm" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Schedule</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['route'=>'admin.schedule.update', 'method'=>'post','id'=>'frmUpdateSchedule', 'name'=>'frmSchedule', 'files'=>true]) !!}
                                    {{ Form::hidden('scheduleId',null, ['class'=>'scheduleId']) }}

                                    @include('admin.schedule._form')


                                    <div class="form-group col-sm-12 ">
                                        <p class="pull-right">
                                            {{ Form::submit('UPDATE', ['class'=>'btn btn-info frmUpdateSchedule' , 'id' => 'updateScheduleButton']) }}
                                            <button class="btn btn-danger" onclick="window.history.go(0); return false;">cancel</button>
                                        </p>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal section -->
@endsection
@section('custom_script')
    <!-- validation script -->
    <script type="text/javascript">
        $(function(){
            $("form[name='frmSchedule']").validate({
                rules:{
                    name : {
                        required : true,
                        minlength : 3,
                        maxlength : 20
                    },
                    email : {
                        required : true
                    }
                },
                messages: {
                    name      : "Enter valid name",
                    colorCode : "enter color codes",
                    imagePath : "select image with proper extension"
                }
            });
        });
    </script>

    <!-- edit script -->
    <script type="text/javascript">

        function edit(id)
        {
            var startTime = $('#startTime_'+id).html();
            var endTime = $('#endTime_'+id).html();

            $('.txtStartTime').val(startTime);
            $('.txtEndTime').val(endTime);

            $('.scheduleId').val(id);

            $('#modalScheduleFrm').modal('show');
        }

        $('#addScheduleButton').click(function(){
            $('#addScheduleButton').attr('disabled',true);
            $('#addScheduleButton').submit();
        });

        $('#updateScheduleButton').click(function(){
            $('#updateScheduleButton').attr('disabled',true);
            $('#frmUpdateSchedule').submit();
        });
    </script>
@endsection

