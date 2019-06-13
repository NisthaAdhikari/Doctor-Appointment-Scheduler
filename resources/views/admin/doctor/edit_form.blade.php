<div class="box-body">
    <div class="form-group">
        <label>Name:</label>
        {{ Form::text('name', isset($name) ? $name : '', ['class'=> 'form-control txtName', 'title' => 'enter name']) }}
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Clinic Name: (if any)</label>
        {{ Form::text('clinic', null, ['class'=> 'form-control txtClinic', 'title' => 'enter clinic']) }}
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Clinic Address: (if any)</label>
        {{ Form::text('clinicAddress', null, ['class'=> 'form-control txtClinicAddress', 'title' => 'enter clinic address']) }}
    </div>
</div>


<div class="box-body">
    <div class="form-group">
        <label>Email:</label>
        {{ Form::text('email', null, ['class'=> 'form-control txtEmail', 'title' => 'enter email']) }}
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Password:</label><br>
        <input type="password" name="doctorPassword" class="form-control txtDoctorPassword" readonly>
        </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Mobile:</label>
        {{ Form::text('mobile', null, ['class'=> 'form-control txtMobile', 'title' => 'enter mobile']) }}
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Specialization:</label>
        {{ Form::text('specialization', null, ['class'=> 'form-control txtSpecialization', 'title' => 'enter specialization']) }}
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Experience:</label>
        {{ Form::text('experience', null, ['class'=> 'form-control txtExperience', 'title' => 'enter experience']) }}
    </div>
</div>


<div class="box-body">
    <div class="form-group">
        <label>Image:</label>
        <br>
        <img src="" class="img img-thumbnail" id="colorImage">
        <div class="imageSection">
        </div>
        <input id="imageUpload" name="imagePath" type='file' title="select your image" />
    </div>
</div>






