<div class="box-body">
    <div class="form-group">
        <label>Doctors:</label>
        <select name="doctor" class="form-control doctorId">
            @foreach($doctorNames as $doctorName)
                <option value="{{$doctorName->id}}">{{ $doctorName->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label>Schedule:</label>
        <select name="start" class="start">
            @foreach($startSchedules as $start)
                <option value="{{ $start->startTime }}">{{ $start->startTime }}</option>
            @endforeach
        </select>
        <select name="end" class="end">
            @foreach($endSchedules as $end)
                <option value="{{ $end->endTime }}">{{ $end->endTime }}</option>
            @endforeach
        </select>
        <input type="date" value="" id="date" name="date">


    </div>

    <div class="box-body">
        <div class="form-group">
            <label>Availability:</label>
        <input type="checkbox" id="isAvailable" name="isAvailable"> Yes
        </div>
    </div>


</div>







