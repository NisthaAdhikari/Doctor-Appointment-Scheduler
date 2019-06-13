@extends('doctorProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px; margin-left: 150px">
        <h1>Patient's Queries</h1>
    </section>


    <div class="box box-primary" style="margin-top: 15px; margin-left: 150px; width: 990px">

        <div class="box-body box-profile">
            <div id="appointment-grid-others" class="grid-view">
                <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th class="text-left"><a class="sort-link">SN.</a></th>
                        <th class="text-left"><a class="sort-link">Patient Name</a></th>
                        <th class="text-left"><a class="sort-link">Question</a></th>
                        <th class="text-left">
                            <a class="sort-link">Response</a>
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($getQuestions)
                        @foreach($getQuestions as $key=>$for)
                            <tr class="odd">
                                <td>{{$key+1}}
                                </td>
                                <td>{{$for->name}}
                                </td>
                                <td>{{$for->question}}
                                </td>
                                <td>
                                    @if(($for->response) == "")
                                        <form action="{{route('respond',[$users->id, $for->id])}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            {{--<input type="hidden" name="question">--}}
                                            {{--<input type="hidden">--}}
                                            <input type="text" name="response" id="response">
                                            <button class="btn btn-small btn-info btn-xs" style="width: 92px" type="submit">
                                                <i class="fa fa-fw fa-question"></i>Respond
                                            </button>
                                        </form>


                                    @else
                                        {{$for->response}}
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <p>No record found</p>
                    @endif
                    </tbody>

                </table>
                {{$getQuestions->links()}}
                <div class="row">
                    <div class="col-md-6"></div>


                </div>

            </div>
        </div>

    </div>




    @endsection