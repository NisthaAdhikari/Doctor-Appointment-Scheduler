@extends('doctorProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>Patient Details</h1>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-4 doctor">

                <div class="box box-solid">
                    <div class="box-body">

                        <div class="card">
                            <div class="card-header text-center" style="align-self: center;">


                                <h4 style="font-weight: bolder"><a>{{(isset($details))? $details->name :" "}}</a></h4>

                            </div>
                            <br>
                            <ul class="list-group list-group-flush" style="text-align: left">
                                @if($details->gender)
                                    <li class="list-group-item">Gender:  <a class="pull-right">{{(isset($details))? $details->gender: ""}}</a></li>
                                    @endif
                                    @if($details->dob)
                                <li class="list-group-item">Date of Birth: <a class="pull-right">{{(isset($details))?$details->dob: ""}}</a></li>
                                    @endif
                                <li class="list-group-item">Phone Number: <a class="pull-right">{{(isset($details))?$details->mobile: ""}}</a></li>
                            </ul>


                        </div>
                    </div>
                </div>




            </div>


            <div class="row">
                <!-- ./col -->

                <!-- ./col -->
                <!-- ./col -->

                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="box box-solid" style="width: 800px">
                        <div class="box-body" >
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr>
                            <th class="text-left"><a class="sort-link">Date</a></th>
                            <th class="text-left"><a class="sort-link">Report</a></th>
                            <th class="text-left" id="appointment-grid-others_c3">
                                <a class="sort-link">Title</a>
                            </th>

                            <th class="button-column"><a class="sort-link">Description</a></th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($app)
                            @foreach($app as $for)

                                <tr class="odd">
                                    <td>{{$for->uploadedOn}}
                                    </td>

                                    <td>
                                        <?php $ext = explode('.', $for->reportImage)?>

                                        @if($ext[1] == "pdf")

                                            <a href="{{asset('lib/images/'. $for->reportImage)}}" target="_blank"><img src="{{ asset('publicimage/'. 'pdf.jpg')}}" alt="Image" height="80px" width="80px"></a>
                                        @else

                                            <a href="{{asset('lib/images/'. $for->reportImage)}}" target="_blank"><img src="{{ asset('lib/images/'. $for->reportImage)}}" alt="Image" height="80px" width="80px"></a>
                                        @endif
                                    </td>

                                    <td>
                                        {{$for->title}}
                                    </td>
                                    <td>
                                        {{$for->description}}
                                    </td>

                                </tr>
                            @endforeach
                        @endif



                        </tbody>
                    </table>
                </div>
                <!-- ./col -->
            </div>
                </div>
            </div>
        </div>
    </section>


    @endsection