@extends('userProfile.main')
@section('adminContent')
    <section class="content-header" style="margin-top: 50px; margin-left: 200px">
        <h1>Edit Profile</h1>
    </section>

    <section class="content">

    <div class="row">
        <div class="box box-solid" style="width: 1000px; margin-left: 200px">
            <div class="box-body" style="margin-left: 40px;">
                <form action="{{route('updateProfile',$users->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
        <div class="col-md-3">

            <div class="form-group">
                <img src="{{ (isset($users) && $users->image)? asset('lib/images/'.$users->image): asset('publicimage/profileImage.png')  }}" alt="Image" height="150px" width="170px"><br><br>
                <br>
                <input type="hidden" name="oldImage" value="{{(isset($users))? $users->image :" " }}">
                {{--<input type="file" name="image" id="image">--}}



                {{--<input id="ytPatient_image" type="hidden" value="" name="Patient[image]">--}}
                <input class="" name="image" id="image" type="file">
            </div>
            <!-- /.form-group -->
        </div>

        <div class="col-md-8">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label required" for="name" style="color: #a8a8a8; font-weight: normal">Patient Name <span class="required" style="color: red">*</span></label>

                        <input class="form-control" name="name" id="name" type="text" maxlength="255" value="{{(isset($users))? $users->name:"" }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        <label class="control-label required" for="gender" style="color: #a8a8a8; font-weight: normal">Gender <span class="required" style="color: red">*</span></label>
                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="male" {{($users->gender == "male") ? "checked" : ""}} > Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="female" {{($users->gender == "female") ? "checked" : ""}}> Female
                                </label>
                            </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label required" for="dob" style="color: #a8a8a8; font-weight: normal">Date of Birth <span class="required" style="color: red">*</span></label>

                        <input class="form-control" name="dob" id="dob" type="date" value="{{(isset($users))? $users->dob:"" }}">                                                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label required" for="mobile" style="color: #a8a8a8; font-weight: normal">Mobile Number <span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                                <span class="input-group-addon">
                                    +977</span>

                            <input class="form-control" name="mobile" id="mobile" type="text" value="{{(isset($users))? $users->mobile:"" }}">

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="email" style="color: #a8a8a8; font-weight: normal">Email <span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            <input class="form-control" name="email" id="email" type="email" maxlength="255" value="{{(isset($users))? $users->email:"" }}">
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label required" for="streetAddress" style="color: #a8a8a8; font-weight: normal">Street Address
                            <span class="required" style="color: red">*
                            </span>
                        </label>
                        <input class="form-control" name="streetAddress" id="streetAddress" type="text" value="{{(isset($users))? $users->streetAddress:"" }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label required" for="location" style="color: #a8a8a8; font-weight: normal">Location/Area
                            <span class="required" style="color: red">*</span></label>
                        <input class="form-control" name="area" id="area" type="text" value="{{(isset($users))? $users->area:"" }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label required" for="city" style="color: #a8a8a8; font-weight: normal">City <span class="required" style="color: red">*</span></label>
                        <input class="form-control" name="city" id="city" type="text" maxlength="255" value="{{(isset($users))? $users->city:"" }}">
                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="landLine" style="color: #a8a8a8; font-weight: normal">Land Line No.</label>
                        <input class="form-control" name="landLine" id="landLine" type="text" maxlength="255" value="{{(isset($users))? $users->landLine:"" }}">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">

                        <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>

            </div>

        </div>
                </form>
            </div>
        </div>
    </div>
    </section>



    @endsection