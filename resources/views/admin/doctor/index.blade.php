@extends('main.layout')
@section('page_title', $page['page_title'])
@section('page_description', $page['page_description'])
@section('adminContent')
    <link href="{{ asset('uploader/jquery.plupload.queue/css/jquery.plupload.queue.css') }}" type="text/css" rel="stylesheet"/>

    <script type="text/javascript" src="{{ asset('js/uploader/jquery.plupload.queue.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>
        <strong>Doctor</strong>
    </h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="box-title"><i class="fa fa-list"></i> List of doctors</h2>
                    <p class="pull-right">
                        <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addCountry">
                            <i class="fa fa-plus">Add Doctor</i></button>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">SN</th>

                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">Image</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Clinic</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Clinic Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Mobile</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Specialization</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 186px;">Experience</th>


                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($doctors)
                                        <?php  $count = 1;   ?>
                                        @foreach($doctors as $doctor)
                                            <tr class="doctor_{{ $doctor->id }}">
                                                <td>{{ $count ++ }}</td>
                                                <td id="image_{{$doctor->id}}">
                                                    @if($doctor->image)
                                                        <img src="{{ asset('lib/images/'.$doctor->image) }}" width="30" height="30">
                                                        @else
                                                        <img src="{{ asset('publicimage/profileImage.png') }}" width="30" height="30">
                                                        @endif

                                                </td>
                                                <td id="name_{{$doctor->id}}">{{ $doctor->name }}</td>
                                                <td id="clinic_{{$doctor->id}}">{{ $doctor->clinic }}</td>
                                                <td id="clinicAddress_{{$doctor->id}}">{{ $doctor->clinicAddress }}</td>
                                                <td id="email_{{$doctor->id}}">{{ $doctor->email }}</td>
                                                <td id="mobile_{{$doctor->id}}">{{ $doctor->mobile }}</td>
                                                <td id="specialization_{{$doctor->id}}">{{ $doctor->specialization }}</td>
                                                <td id="experience_{{$doctor->id}}">{{ $doctor->experience }}</td>
                                                <td hidden id="doctorPassword_{{$doctor->id}}">{{ $doctor->doctorPassword }}</td>

                                                <td>

                              	   	       <a href="#"  title="Edit" id="editDoctor" onclick="edit('{{ $doctor->id  }}')">
                              	   	         <i class="fa fa-fw fa-lg fa-pencil-square-o btnUpdateDoctor" data-toggle="modal" data-target="#updateCountry"></i>
                              	   	     </a>


                              	   	 	 	  <a href="" class="txt-color-red deleteMe"
                                                 data-url="{!! route('admin.doctor.delete', $doctor->id ) !!}" title="delete doctor" data-name="{{ $doctor->name }}" data-id = "{{ $doctor->id }}">
                              	   	          <i class="fa fa-fw fa-lg fa-trash-o deletable text-danger"> </i> </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
    {{$doctors->links()}}
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
                                <h4 class="modal-title"><strong>Add doctor</strong></h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route'=>'admin.doctor.store', 'name'=>'frmDoctor', 'method'=>'post', 'files'=>true]) !!}
                                @include('admin.doctor._form')
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
                    <div id="modalDoctorFrm" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Doctor</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['route'=>'admin.doctor.update', 'method'=>'post','id'=>'frmUpdateDoctor', 'name'=>'frmColor', 'files'=>true]) !!}
                                    {{ Form::hidden('doctorId',null, ['class'=>'doctorId']) }}

                                    @include('admin.doctor.edit_form')

                                    <div class="row">
                                        <div class="col-md-6 offset-md-6">
                                            <div id="image_section"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 ">
                                        <p class="pull-right">
                                            {{ Form::submit('UPDATE', ['class'=>'btn btn-info frmUpdateDoctor' , 'id' => 'updateDoctorButton']) }}
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
            $("form[name='frmDoctor']").validate({
                rules:{
                    name : {
                        required : true,
                        minlength : 3,
                        maxlength : 20
                    },
                    email : {
                        required : true
                    },
                    imagePath : {
                        extension: 'jpeg,png',
                        type: 'image/jpeg,image/png',
                    },
                    mobile:{
                        required: true
                    }
                },
                messages: {
                    name      : "Enter valid name",
                    email : "enter email",
                    mobile : "enter mobile",
                    imagePath : "select image with proper extension"
                }
            });
        });
    </script>

    <!-- edit script -->
    <script type="text/javascript">

        function edit(id)
        {
            var name = $('#name_'+id).html();
            var email = $('#email_'+id).html();
            var clinic = $('#clinic_'+id).html();
            var clinicAddress = $('#clinicAddress_'+id).html();
            var doctorPassword = $('#doctorPassword_'+id).html();

            var mobile = $('#mobile_'+id).html();
            var specialization = $('#specialization_'+id).html();
            var experience = $('#experience_'+id).html();

            var image = $('#image_'+id).html();

            $('.txtName').val(name);
            $('.txtClinic').val(clinic);
            $('.txtEmail').val(email);
            $('.txtMobile').val(mobile);
            $('.txtSpecialization').val(specialization);
            $('.txtDoctorPassword').val(doctorPassword);
            $('.txtExperience').val(experience);
            $('.txtClinicAddress').val(clinicAddress);
            $('.doctorId').val(id);
            $('#image_section').html(image);
            $('#modalDoctorFrm').modal('show');
        }

        $('#addDoctorButton').click(function(){
            $('#addDoctorButton').attr('disabled',true);
            $('#addDoctorButton').submit();
        });

        $('#updateDoctorButton').click(function(){
            $('#updateDoctorButton').attr('disabled',true);
            $('#frmUpdateDoctor').submit();
        });
    </script>
@endsection