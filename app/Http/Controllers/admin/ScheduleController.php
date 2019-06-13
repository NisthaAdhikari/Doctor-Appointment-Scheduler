<?php

namespace App\Http\Controllers\admin;

use App\model\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    //
    protected $filePath    = 'admin.schedule';
    protected $tablename    = 'schedule';
    protected $imagePath;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){
        $page['page_title']          = config('app.name') . ': Schedule list';
        $page['page_description']    = config('app.name') . ': Schedule list,  Doctor Appointment Scheduler';

        $schedules = Schedule::orderby('startTime', 'ASC')->where(['softDelete' => 0])->paginate(config('activityMessage.pagination'));
        return view($this->filePath . '.index', compact(['page','schedules']));
    }


    public function store(Request $request){
        $save = new Schedule();
        $save->startTime       = $request->startTime;
        $save->endTime       = $request->endTime;


        $mySave = $save->save();

        if ($mySave) {
            return back()->withMessage(config('activityMessage.saveMessage') . $request->startTime. "-" . $request->endTime);
        }else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }
    }

    public function update(Request $request)
    {

        $data = $request->except('_token');

        $myData = Schedule::findOrFail($data['scheduleId']);

        if($myData){

            $myData->startTime = $data['startTime'];
            $myData->endTime = $data['endTime'];

            $myData->save();
            $save=true;
        }
        else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }

        if ($save) {
            return back()->withMessage(config('activityMessage.updateMessage') . $request->startTime. "-" . $request->endTime);
        }else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }
    }

    public function destroy($id)
    {
        $delId = Schedule::findOrFail($id);
        $delId->softDelete = 1;
        $myDel = $delId->update();
        if ($myDel) {
            return back()->withMessage(config('activityMessage.deleteMessage'));
        }else{
            return back()->withMessage(config('activityMessage.unDeleteMessage'));
        }
    }


    public function changeStatus(Request $request){
        $id  = $request->id;
        dd($request->id);
        $status = $request->status==1 ? 0 : 1;

        $changeStatus = DB::table($this->tablename)->where('id', $id)->update(['status' => $status]);
        if ($changeStatus) {
            return back()->withMessage(config('activityMessage.EnableMessage'));
        }else{
            return back()->withMessage(config('activityMessage.DisableMessage'));
        }


    }
}
