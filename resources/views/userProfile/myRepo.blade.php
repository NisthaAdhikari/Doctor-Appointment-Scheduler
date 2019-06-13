@extends('userProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>  My Reports
            <a class="btn btn-info" style="margin-left: 950px" data-toggle="modal" data-target="#myModal">Add Reports</a>


        </h1>


        <div class="box box-primary">

            <div class="box-body box-profile">

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Reports</h4>
                            </div>
                            <div class="modal-body"  style="height: 400px">
                                <form action="{{route('storeReports',$users->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label class="control-label required" for="title" style="color: #a8a8a8; font-weight: normal">Title<span class="required" style="color: red">*</span></label>

                                            <input class="form-control" name="title" id="title" type="text" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label required" for="description" style="color: #a8a8a8; font-weight: normal">Description<span class="required" style="color: red">*</span></label>

                                            <textarea class="form-control" name="description" id="description" type="text" rows="2" cols="50" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label required" for="doctor" style="color: #a8a8a8; font-weight: normal">Examined Doctor:<span class="required" style="color: red">*</span></label>
                                            <select class="form-control" name="doctor" id="doctor">
                                                <option>--Select doctor--</option>
                                                @foreach($doctors as $doc)
                                                    <option>{{$doc->name}}-{{$doc->specialization}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <input type="file" name="image" id="image"> <br>

                                        <div class="modal-footer">
                                            <button class="btn btn-info"><i class="fa fa-upload"> Upload</i></button>
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
                            <th class="text-left"><a class="sort-link" >Title</a></th>
                            <th class="text-left"><a class="sort-link" >Report</a></th>
                            <th class="text-left"><a class="sort-link" >Examined by</a></th>
                            <th class="text-left">
                                <a class="sort-link">Description</a>
                            </th>
                            <th class="text-left" ><a class="sort-link" >Uploaded On</a>
                            </th>
                            <th class="button-column"><a class="sort-link" >Action</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($savedReport)
                            @foreach($savedReport as $for)
                                <tr class="odd">
                                    <td><div> {{$for->title}}
                                            {{--<h4 >{{$for->appointmentTime}}</h4>--}}
                                            {{--<div class="date">--}}
                                            {{--<h2>01</h2>--}}
                                            {{--<p class="month">{{$for->appointmentDate}}</p>--}}
                                            {{--<p class="time">04:00 PM</p>--}}
                                            {{--</div>--}}
                                        </div>
                                    </td>
                                    <td>
                                        <?php $ext = explode('.', $for->reportImage)?>

                                        @if($ext[1] == "pdf")
                                            <a href="{{asset('lib/images/'. $for->reportImage)}}" target="_blank"><img src="{{ asset('publicimage/'. 'pdf.jpg')}}" alt="Image" height="100px" width="100px"></a>
                                        @else
                                            <a href="{{asset('lib/images/'. $for->reportImage)}}" target="_blank"><img src="{{ asset('lib/images/'. $for->reportImage)}}" alt="Image" height="100px" width="100px"></a>
                                        @endif
                                    </td>
                                    <td>{{isset($for->name)?$for->name:""}} - {{isset($for->specialization)? $for->specialization : ""}}</td>
                                    <td>{{$for->description}}<br>
                                    </td>
                                    <td>
                                        {{$for->uploadedOn}}
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

                                            <a title="Delete" href="{{route('delete',[$for->id,$users->id])}}" class="btn btn-small btn-danger btn-xs" style="width: 92px">
                                                <i class="fa fa-fw fa-close"></i> Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6"></div>


                    </div>

                </div>
            </div>

        </div>




    </section>






    @endsection
