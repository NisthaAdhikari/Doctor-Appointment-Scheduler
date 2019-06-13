@extends('userProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>Ask Questions</h1>
    </section>

    <div class="box box-primary">
        <div class="box-body box-profile" style="height: 500px;">
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Visited Doctors</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                {{--<input type="text" class="search-bar" placeholder="Search" >--}}
                            </div>
                        </div>
                    </div>


                    <div class="inbox_chat">
                        @foreach($getDoctors as $doc)
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="{{(isset($doc) && $doc->image)? asset('lib/images/'.$doc->image):asset('publicimage/profileImage.png') }}" alt="sunil"> </div>
                                    <a href="{{route('getQuestions',[$users->id,$doc->id])}}">
                                        <div class="chat_ib">
                                            <h5>{{$doc->name}} <span class="chat_date">Dec 25</span></h5>
                                            <p>{{$doc->specialization}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mesgs">
                    Click on the doctor to view messages


                </div>


            </div>

        </div>
        <!-- /.row -->
        </div>
    </div>
























    <!------ Include the above in your HEAD tag ---------->





















    @endsection
