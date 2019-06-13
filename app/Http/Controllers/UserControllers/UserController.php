<?php

namespace App\Http\Controllers\UserControllers;

use App\model\doctor;
use App\model\Patient;
use App\model\Report;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Middleware\VerifyDoctor;
use App\Http\Middleware\VerifyPatient;


class UserController extends Controller
{
    //
    protected $filePath = 'User';

    public function __construct()
    {
        $this->middleware('VerifyPatient', ['only' => ['getPatientProfile']]);
    }

    public function getIndex()
    {

        return view($this->filePath . '.home');
    }

    public function getLoginPage()
    {
        return view($this->filePath . '.login');
    }

    public function getDoctorRegistrationPage()
    {
        return view($this->filePath . '.doctorRegistration');
    }

    public function getPatientRegistrationPage()
    {
        return view($this->filePath . '.patientRegistration');
    }

    public function checkDoctorProfile(Request $request)
    {
        $data = $request->all();
        //dd($data['doctorUsername']);
        $users = doctor::where('email', $data['doctorUsername'])->first();
        dd($users);
        if ($users) {
            if (Hash::check($data['doctorPassword'], $users->doctorPassword)) {
                return redirect(route('docProfile', $users->id));
            } else {
                return redirect(route('getLoginPage'));
            }
        } else {
            return redirect(route('getLoginPage'));
        }
    }

    public function checkLogin(Request $request)
    {
        $username = $request->patientUsername;
        $data = $request->all();
        $users = Patient::where('email', $data['patientUsername'])->first();
        if ($users) {
            if (Hash::check($data['patientPassword'], $users->patientPassword)) {
                Session::put(['patient'=>['email'=>$request->patientUsername,
                    'id'=>$users->id]]);
//                $request->session()->put('patient',$username);

                return redirect(route('patientProfile', $users->id));
            } else {
                return Redirect::back()->withErrors(['Invalid Password']);

            }
        } else {
            return Redirect::back()->withErrors(['Invalid Login Credentials']);
        }

//       $request->session()->put('user',$request->input('patientUsername'));
//      print_r($request->session()->put('user'));
    }

    public function getPatientProfile($id)
    {
        if (Session::has('patient')){
            $current=Carbon::today()->toDateString();
            $c=new DateTime($current);

            $users = Patient::where('id', $id)->first();

            $totalReports = DB::table('report')->where('patientId',$id)->count();
            $app = DB::table('doctor')
                ->join('appointment', 'doctor.id', '=', 'appointment.doctorId')
                ->where('appointment.mobile', $users->mobile)
                ->where('appointmentStatus','=','1')
                ->where('appointmentDate','>=',$current)
                //->where('appointment.patientName', '=', $users->name)
                ->count();

            return view($this->filePath . '.patientProfile', compact('users','totalReports','app'));
        }
        else{
            return view($this->filePath . '.login');
        }
    }

    public function getDoctorProfile($id)
    {
        if (Session::has('doctor')) {
            $users = doctor::where('id', $id)->first();

            $totalReports = DB::table('report')->count();

            return view('doctorProfile.doctorProfile', compact('users'));
        }
        else{
            return view($this->filePath . '.login');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->forget('patient');
        Session::flush();
        return view($this->filePath . '.login');
    }


    public function getBookingInfo($id)
    {
        $current = Carbon::now()->toDateString();

        $data = DB::table('doctor')
            ->leftJoin('doctor_schedule', 'doctor.id', '=', 'doctor_schedule.doctorId')
            ->leftJoin('schedule', 'doctor_schedule.scheduleId', '=', 'schedule.id')
            ->where('doctor.softDelete', '=', 0)
            ->where('doctor.status', '=', 0)
            ->where('doctor.id', '=', $id)
            ->where('doctor_schedule.date','>', $current )
            ->select('doctor.id', 'doctor.name', 'doctor.specialization', 'schedule.endTime', 'schedule.startTime',
                'doctor_schedule.date', 'doctor_schedule.day')
            ->take(5)
            ->orderBy('doctor_schedule.date', 'ASC')
            ->get();

        $test = DB::table('doctor')->where('id', $id)->get();

        $bookedTime = DB::table('appointment')->where('doctorId',$id)->where('appointmentStatus','1')->select('appointmentDate','appointmentTime')->get();

        $appointments = array();

        foreach ($bookedTime as $key=>$booked){
            $date = $booked->appointmentDate;
            $day = $booked->appointmentTime;
            $appointment = $date. ' '. $day;

            $appointments[]= $appointment;
        }
        return view($this->filePath . '.bookingInfo', compact(['test', 'data','bookedTime','appointments']));
    }

    public function getBookingPage()
    {
//        $test = DB::table('doctor')
//            ->leftJoin('doctor_schedule', 'doctor.id', '=', 'doctor_schedule.doctorId')
//            ->leftJoin('schedule', 'doctor_schedule.scheduleId', '=', 'schedule.id')
//            ->where('doctor.softDelete', '=', 0)
//            ->where('doctor.status', '=', 0)
//            ->select('doctor.id','doctor.name','doctor.image', 'doctor.specialization','doctor.experience','doctor.specialization','schedule.endTime', 'schedule.startTime',
//                'doctor_schedule.date','doctor_schedule.day')
//            ->get();

        $test = DB::table('doctor')->where('softDelete', '=', 0)
            ->where('status', '=', 0)
            ->where('specialization','!=','')->get();

        return view($this->filePath . '.bookingPage', compact('test'));
    }

    public function getBookingForm($id, $date, $day, $selectedTime, $mins = null)
    {
//        dd($id,$date,$day,$selectedTime,$mins);
//        $dayDate = $day . "," . $date;
        if ((int)$selectedTime >= 12) {
            $time = " PM";
        } else {
            $time = " AM";
        }
        if ($mins === "3") {
            $m = ":30";
        } else {
            $m = ":00";
        }
        $bookedtime = $selectedTime . $m . $time;

        $test = DB::table('doctor')->where('softDelete', '=', 0)
            ->where('id', $id)
            ->where('status', '=', 0)->get();
        return view($this->filePath . '.bookingForm', compact(['test', 'day','date', 'bookedtime']));
    }

    public function getMyAppointments($id)
    {
        $current=Carbon::today()->toDateString();
        $users = Patient::where('id', $id)->first();

        $forOthers = DB::table('doctor')
            ->join('appointment', 'doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile', $users->mobile)
            ->where('appointment.patientName', '!=', $users->name)
            ->where('appointmentStatus','=','1')
            ->where('appointmentDate','>=',$current)
            ->select('appointment.id', 'appointment.appointmentNo', 'appointment.patientName', 'appointment.mobile', 'doctor.name','doctor.clinic',
                'appointment.appointmentDate', 'appointment.appointmentMade', 'appointment.appointmentTime')
            ->get();


        $forMe = DB::table('doctor')
            ->join('appointment', 'doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile', $users->mobile)
            ->where('appointment.patientName', '=', $users->name)
            ->where('appointmentStatus','=','1')
            ->where('appointmentDate','>=',$current)
            ->select('appointment.id', 'appointment.appointmentNo', 'appointment.patientName','doctor.clinic', 'appointment.mobile', 'doctor.name',
                'appointment.appointmentDate','appointment.appointmentMade', 'appointment.appointmentTime')
            ->get();
        return view('userProfile.myAppointments', compact(['users', 'forOthers', 'forMe']));
    }

    public function getMyRepository($id){
        $users = Patient::where('id', $id)->first();
        $savedReport = DB::table('report')
            ->leftJoin('doctor','report.doctorId','=','doctor.id')
            ->select('report.id', 'report.title', 'report.description', 'report.uploadedOn', 'report.reportImage', 'report.patientId', 'report.doctorId','doctor.name','doctor.specialization')
            ->where('patientId',$id)->get();

        $doctors=DB::table('appointment')
            ->join('doctor','appointment.doctorId','=','doctor.id')
            ->select('doctor.id','doctor.name','doctor.specialization')
            ->where('appointment.patientName','=',$users->name)
            ->distinct()
            ->get();
        return view('userProfile.myRepo',compact('users','savedReport','doctors'));
    }

    public function edit($id)
    {
        $users = Patient::where('id', $id)->first();
        return view('userProfile.editProfile', compact('users'));
    }

    public function update($id, Request $request)
    {
//        dd($id, $request);

        $patient = Patient::findOrFail($id);
        if ($patient) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . "." . $ext;
                $uploadPath = public_path('lib/images');
                $image->move($uploadPath, $imageName);
                $patient->image = $imageName;
            } else {
                $patient->image = $request->oldImage;
            }
            $patient->name = $request->name;
            $patient->gender = $request->gender;
            $patient->dob = $request->dob;
            $patient->mobile = $request->mobile;
            $patient->email = $request->email;
            $patient->streetAddress = $request->streetAddress;
            $patient->area = $request->area;
            $patient->city = $request->city;
            $patient->landLine = $request->landLine;

            $users = Patient::where('id', $id)->first();
            $update = $patient->update();
            if ($update){
                return redirect(route('patientProfile', compact('users')));
            }
            else{
                return back();
            }
        }

    }


    public function storeReports($id, Request $request){


        $report=new Report();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . "." . $ext;
            $uploadPath = public_path('lib/images');
            $image->move($uploadPath, $imageName);
            $report->reportImage = $imageName;

        }
        $report->title = $request->title;
        $report->description = $request->description;
        $current = Carbon::now();
        $report->uploadedOn = $current;
        $report->patientId = $id;
        if ($request->doctor == "--Select doctor--")
        {
            $report->doctorId=null;
        }
        else{
            $docName= explode('-',$request->doctor);

            $getDocId = DB::table('doctor')->select('*')
                ->where('name','=',$docName[0])
                ->where('specialization','=',$docName[1])->first();

            $report->doctorId = $getDocId->id;
        }

        $mySave = $report->save();

        $users = Patient::where('id', $id)->first();
        $doctors=DB::table('appointment')
            ->join('doctor','appointment.doctorId','=','doctor.id')
            ->select('doctor.id','doctor.name','doctor.specialization')
            ->where('appointment.patientName','=',$users->name)
            ->get();
        $savedReport = DB::table('report')->where('patientId',$id)->get();
        if ($mySave) {
            return redirect(route('myRepo', compact(['users','savedReport','doctors'])));

        }
    }




    public function delete($id,$userId)
    {

        $users = Patient::where('id', $userId)->first();
        $delId = Report::findOrFail($id);

        $myDel = $delId->delete();
        if($myDel){
            return redirect(route('myRepo', compact('users')));
        }
        else{
            return back();
        }
    }


}
