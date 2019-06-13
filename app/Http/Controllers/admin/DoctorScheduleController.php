<?php

namespace App\Http\Controllers\admin;

use App\model\DoctorSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
class DoctorScheduleController extends Controller
{
    //
    protected $viewPath='admin.doctorSchedule';
    public function index()
    {
        $page['page_title']          = config('app.name') . ': Doctor-Schedule list';
        $page['page_description']    = config('app.name') . ': Doctor-Schedule list,  Doctor Appointment Scheduler.';

        $doctorSchedules = DB::table('doctor_schedule')->orderby('date', 'desc')
            ->where(['softDelete' => 0])
            ->paginate(config('activityMessage.pagination'));

        $doctorNames=DB::table('doctor')
            ->where(['status'=> 0, 'softDelete' => 0])
            ->get(['name','id']);

        $startSchedules=DB::table('schedule')
            ->where(['status'=> 0, 'softDelete' => 0])
            ->distinct()
            ->get(['startTime']);

        $allSchedules=DB::table('doctor')
            ->join('doctor_schedule','doctor_schedule.doctorId','=','doctor.id')
            ->join('schedule','doctor_schedule.scheduleId','=','schedule.id')
            ->select('*')->get();

        $endSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['endTime']);
        return view($this->viewPath . '.index', compact(['page','doctorSchedules','doctorNames','startSchedules','endSchedules','allSchedules']));
    }

    public function store(Request $request)
    {
        $save = new DoctorSchedule();
        $scheduleId = DB::table('schedule')->where(['startTime'=>$request->start, 'endTime'=>$request->end])->first();


        $save->doctorId       = $request->doctor;
        $save->scheduleId     = $scheduleId->id;
        $date=$request->date;
        $save->date     = $date;
        $d   = new DateTime($date);
        $day = $d->format('l');
        $save->day     = $day;

        if($request->isAvailable == null) {
            $save->isAvailable = false;
        }
        else{
            $save->isAvailable = true;
        }
        $mySave = $save->save();
        if ($mySave) {
            return back()->withMessage(config('activityMessage.saveMessage'));
        }else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }
    }

    public function destroy($id)
    {

        $delId = DoctorSchedule::findOrFail($id);
        dd($delId);
        $delId->softDelete = 1;
        $myDel = $delId->update();
        if ($myDel) {
            return back()->withMessage(config('activityMessage.deleteMessage'));
        }else{
            return back()->withMessage(config('activityMessage.unDeleteMessage'));
        }
    }


}

