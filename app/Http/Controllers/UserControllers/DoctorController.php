<?php

namespace App\Http\Controllers\UserControllers;

use App\model\doctor;
use App\model\DoctorSchedule;
use App\model\Question;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class DoctorController extends Controller
{
    //
    protected $filepath = 'doctorProfile';


    public function __construct()
    {
        $this->middleware('VerifyDoctor', ['only' => ['getDoctorProfile','edit','update','getAllAppointments','getAskedQuestions','respond','viewPatientDetails']]);
    }

    public function getDoctorProfile($id)
    {
        if (Session::has('doctor')){
            $current=Carbon::today()->toDateString();
            $c=new DateTime($current);

            $users = doctor::where('id', $id)->first();
            $app= DB::table('appointment')
                ->where('doctorId',$id)
                ->where('appointmentStatus','=','1')
                ->where('appointmentDate','>=',$current)->count();
            return view('doctorProfile.doctorProfile', compact('users','app'));
        }
        else{
            return view($this->filePath . '.login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('doctor');
        Session::flush();
        return view('User.login');
    }

    public function checkDoctorLogin(Request $request)
    {
        $username = $request->doctorUsername;
        $data = $request->all();
        $users = doctor::where('email', $data['doctorUsername'])->first();
        if ($users) {
            if (Hash::check($data['doctorPassword'], $users->doctorPassword)) {
                Session::put(['doctor'=>['email'=>$request->doctorUsername,
                    'id'=>$users->id]]);
//                $request->session()->put('patient',$username);

                return redirect(route('doctorProfile', $users->id));
            } else {
                return Redirect::back()->withErrors(['Invalid Password']);
            }
        } else {
            return Redirect::back()->withErrors(['Invalid Login Credentials']);
        }

//       $request->session()->put('user',$request->input('patientUsername'));
//      print_r($request->session()->put('user'));
    }

    public function edit($id)
    {
        $users = doctor::where('id', $id)->first();
        if ($users) {
            return view('doctorProfile.editProfile', compact('users'));
        } else {

        }

    }

    public function update($id, Request $request)
    {
//        dd($id, $request);

        $doctor = doctor::findOrFail($id);
        if ($doctor) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . "." . $ext;
                $uploadPath = public_path('lib/images');
                $image->move($uploadPath, $imageName);
                $doctor->image = $imageName;
            } else {
                $doctor->image = $request->oldImage;
            }
            $doctor->name = $request->name;


            $doctor->mobile = $request->mobile;
            $doctor->email = $request->email;
            $doctor->clinic = $request->clinic;
            $doctor->clinicAddress = $request->clinicAddress;

            $doctor->specialization = $request->specialization;
            $doctor->experience = $request->experience;

            $users = doctor::where('id', $id)->first();
            $update = $doctor->update();
            if ($update) {
                return redirect(route('doctorProfile', compact('users')));
            } else {
                return back();
            }
        }

    }

    public function getAllAppointments($id)
    {
            $users = doctor::where('id', $id)->first();
//        $user_info = DB::table('usermetas')
//            ->select('browser', DB::raw('count(*) as total'))
//            ->groupBy('browser')
//            ->get();
        $current=Carbon::today()->toDateString();
        $c=new DateTime($current);

        $app = DB::table('appointment')
            ->select('*')
            ->where('doctorId', $id)
            ->where('appointmentDate','>=',$current)
            ->where('appointmentStatus','=','1')
            ->orderBy('appointmentDate', 'DESC')->paginate(10);


        $details = DB::table('patient')
            ->select('*')
            ->first();

        $patient = DB::table('patient')->select('name','mobile')->get();
        $patients = array();
        $mobiles = array();
        foreach ($patient as $key=>$p){
            $patients[]= $p->name;
            $mobiles[]= $p->mobile;
        }

        return view('doctorProfile.allAppointments', compact(['users', 'app','patients','mobiles']));

    }

    public function getAskedQuestions($id)
    {
        $users = doctor::where('id', $id)->first();

        $getQuestions = DB::table('patient')
            ->join('question', 'patient.id', '=', 'question.patientId')
            ->join('doctor', 'question.doctorId', '=', 'doctor.id')
            ->select('patient.name', 'question.question', 'question.response', 'question.id')
            ->where('question.doctorId', $id)
            ->orderBy('question.id', 'DESC')->paginate(10);

        return view('doctorProfile.askedQuestions', compact(['users', 'getQuestions']));
    }


    public function respond($id, $quesId, Request $request)
    {
        $question = Question::findOrFail($quesId);

        $users = doctor::where('id', $id)->first();
        if ($question) {
            $question->response = $request->response;

            $update = $question->update();

            $getQuestions = DB::table('patient')
                ->join('question', 'patient.id', '=', 'question.patientId')
                ->join('doctor', 'question.doctorId', '=', 'doctor.id')
                ->select('patient.name', 'question.question', 'question.response', 'question.id')
                ->where('question.doctorId', $id)->get();

            if ($update) {
                return redirect(route('askedQuestions', compact(['users', 'getQuestions'])));

            } else {
                return back();
            }
        }
    }

    public function viewPatientDetails($docId,$pName){
        $users = doctor::where('id', $docId)->first();

        $details = DB::table('patient')
            ->select('*')
            ->where('name',$pName)->first();

        $app = DB::table('report')
            ->join('patient','report.patientId','=','patient.id')
            ->select('*')
            ->where('patient.name',$pName)
            ->where('doctorId','=',$docId)
            ->get();
        return view('doctorProfile.viewPatientDetails', compact(['users', 'details','app']));

    }


    public function schedule($id){
        $users = doctor::where('id', $id)->first();

        $startSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['startTime']);

        $endSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['endTime']);

        $allSchedules=DB::table('doctor_schedule')->join('schedule','doctor_schedule.scheduleId','=','schedule.id')
            ->select('doctor_schedule.id','doctor_schedule.date','schedule.startTime','schedule.endTime')
            ->where('doctorId',$id)->distinct()->orderBy('doctor_schedule.date', 'DESC')->paginate(10);

        return view('doctorProfile.addSchedule', compact(['users','startSchedules','endSchedules','allSchedules']));
    }

    public function saveSchedule($id,Request $request){
        $save = new DoctorSchedule();
        $scheduleId = DB::table('schedule')->where(['startTime'=>$request->start, 'endTime'=>$request->end])->first();
        $save->doctorId       = $id;
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
        $startSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['startTime']);

        $endSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['endTime']);

        if ($mySave) {
            return redirect(route('schedule',$id, compact(['users','startSchedules','endSchedules'])));
        }
    }

    public function editSchedule($id, $scheduleId){

        $users = doctor::where('id', $id)->first();
        $startSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['startTime']);

        $endSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['endTime']);


        $doctorSchedule = DB::table('doctor_schedule')
            ->join('schedule','doctor_schedule.scheduleId','=','schedule.id')
            ->select('doctor_schedule.id','doctor_schedule.date','schedule.startTime','schedule.endTime')
            ->where('doctor_schedule.doctorId',$id) ->where('doctor_schedule.id',$scheduleId)->first();

        if ($users) {
            return view('doctorProfile.editSchedule', compact(['users','doctorSchedule','startSchedules','endSchedules']));
        } else {

        }
    }

    public function updateSchedule($id, $schedule, Request $request){

        $scheduleId = DB::table('schedule')->where(['startTime'=>$request->start, 'endTime'=>$request->end])->first();
        $startSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['startTime']);
        $endSchedules=DB::table('schedule')->where(['status'=> 0, 'softDelete' => 0])->distinct()->get(['endTime']);

        $users = doctor::where('id', $id)->first();
        $doctor = DoctorSchedule::findOrFail($schedule);

        if ($doctor) {

            $doctor->doctorId = $id;
            $doctor->scheduleId = $scheduleId->id;

            $date = $request->date;
            $doctor->date = $date;
            $d = new DateTime($date);
            $day = $d->format('l');
            $doctor->day = $day;
            if ($request->isAvailable == null) {
                $doctor->isAvailable = false;
            } else {
                $doctor->isAvailable = true;
            }
            $mySave = $doctor->update();

            if ($mySave) {
                return redirect(route('schedule', $id, compact(['users', 'startSchedules', 'endSchedules'])));
            }
        }

    }


    public function deleteSchedule($id,$scheduleId)
    {
       $delete =  DB::table('doctor_schedule')->where('id',$scheduleId)->delete();
       if ($delete){
           return back();
       }

    }

}
