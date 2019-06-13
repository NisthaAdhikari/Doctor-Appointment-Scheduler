@extends('main.layout')
@section('page_title', $page['page_title'])
@section('page_description', $page['page_description'])
@section('adminContent')

    <h1>
        <strong>DoctorSchedule</strong>
    </h1>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-list"></i> List of Schedule</h3>
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
                                <div id="example1_filter" class="dataTables_filter"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">SN</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 200px;">Doctor</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Start Time(24-hour format)</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">End Time(24-hour format)</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Date</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($allSchedules)
                                        @foreach($allSchedules as $key=>$for)
                                            <tr class="odd">
                                                <td>{{$key+1}}
                                                </td>
                                                <td>{{$for->name}}
                                                </td>



                                                <td>{{$for->startTime}}<br>
                                                </td>
                                                <td>
                                                    {{$for->endTime}}
                                                </td>
                                                <td>{{$for->date}}
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
                                <h4 class="modal-title"><strong>Add Doctor-Schedule</strong></h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route'=>'admin.doctorSchedule.store', 'id' => 'addDoctorScheduleForm', 'name'=>'frmDoctorSchedule', 'method'=>'post']) !!}
                                @include('admin.doctorSchedule._form')
                                <p class="pull-right">
                                   {!! Form::submit('CREATE', ['class'=>'btn btn-info','id'=>'addDoctorScheduleButton']) !!}
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
                    <div id="modalPriceFrm" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><strong>Update Doctor-Schedule</strong></h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['route'=>'admin.doctorSchedule.update', 'method'=>'post','id'=>'frmUpdateDoctorSchedule', 'name'=>'frmDoctorSchedule']) !!}
                                    {{ Form::hidden('id',null, ['class'=>'id']) }}

                                    @include('admin.doctorSchedule._form')

                                    <div class="form-group col-sm-12 ">
                                        <p class="pull-right">
                                            {{ Form::submit('UPDATE',   ['class'=>'btn btn-info frmUpdateDoctorSchedule','id' =>'updateDoctorScheduleButton' ]) }}
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
            <!-- modal section -->
        </div>
    </div>

@section('custom_script')
    <!-- validation script -->
    <script type="text/javascript">
        $(function(){
            $("form[name='frmPrice']").validate({
                rules:{
                    price : {
                        required : true
                    },
                    color : {
                        required : true
                    },
                },
                messages: {
                    price : "Enter price",
                    color: "Enter 1 for single and 2 for multiple color"
                }
            });
        });
    </script>

    <!-- edit script -->
    <script type="text/javascript">

        function edit(id)
        {
            var material= $('#materialId_'+id).html();
            var size = $('#sizeId_'+id).html();
            var ply = $('#plyId_'+id).html();
            var weaver = $('#weaverId_'+id).html();
            var color = $('#color_'+id).html();
            var price = $('#priceId_'+id).html();


            $('.materialId option[value='+material+']').attr('selected','selected');
            $('.sizeId option[value='+size+']').attr('selected','selected');
            $('.plyId option[value='+ply+']').attr('selected','selected');
            $('.weaverIdId option[value='+weaver+']').attr('selected','selected');

            $('.txtColor').val(color);
            $('.txtPrice').val(price);
            $('.id').val(id);
            $('#modalPriceFrm').modal('show');
        }

        $('#addPriceButton').click(function(){
            $('#addPriceButton').attr('disabled',true);
            $('#addPriceForm').submit();
        });

        $('#updatePriceButton').click(function(){
            $('#updatePriceButton').attr('disabled',true);
            $('#frmUpdatePrice').submit();
        });
    </script>
    @endsection
@endsection
