@extends('userProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px">
        <h1>Ask Questions</h1>
    </section>

    <div class="box box-primary">

        <div class="box-body box-profile">
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Visited Doctors</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">

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
                    @if($getQuestions)
                        @foreach($getQuestions as $ques)

                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>{{$ques->question}}</p>
                                    @if($ques->response == "")
                                        <div style="font-size:12px; font-weight: 600; color:#888">
                                            <i class="fa fa-fw fa-info-o" style="font-size:19px;margin-right:5px;"></i>
                                            No response yet to: {{$ques->question}}
                                        </div>
                                    @endif
                                    {{--<span class="time_date"> 11:01 AM    |    June 9</span> </div>--}}
                                </div>
                                <div class="incoming_msg">
                                    {{--<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            @if($ques->response)
                                                <p>{{$ques->response}}</p>

                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif


                                </div>


                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <form action="{{route('sendQuestion',[$users->id,$docId])}}" method="post">
                                        {{csrf_field()}}
                                        <input type="text" class="write_msg"  name="question" style="border-color: skyblue"  />
                                        <button class="msg_send_btn" id= "register" type="submit" disabled="disabled" ><i class="fa fa-paper-plane-o" aria-hidden="true" ></i></button>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>

</div>
    </div>

    <script>
        (function() {
            $('form > input').keyup(function() {

                var empty = false;
                $('form > input').each(function() {

                    if ($(this).val() == '') {
                        empty = true;
                    }
                });

                if (empty) {

                    $('#register').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
                } else {

                    $('#register').removeAttr('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
                }
            });
        })()
    </script>

@endsection
