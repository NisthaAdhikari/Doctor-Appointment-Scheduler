<?php

namespace App\Http\Controllers\UserControllers;

use App\model\Appointment;

use App\model\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SendCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    //
    protected $viewPath = 'User';

    public function storeAppointmentDetails($id, Request $request, $day, $date, $bookedtime)
    {
        $this->validate($request,[

            'mobile' => 'required|regex:/(98)[0-9]{8}/',

        ]);

        $data = ['9813021094', '9843494020','9841325606'];
        $number = $request->mobile;
        if(in_array($number,$data)){
            $save = new Appointment();
            $random = rand(1000, 999999);
            $appointmentNo = 'A' . $random;
            $current = Carbon::now();
            $save->appointmentNo = $appointmentNo;
            $save->patientName = $request->patientName;
            $save->mobile = $request->mobile;
            $save->doctorId = $id;
            $save->appointmentDay = $day;
            $save->appointmentDate = $date;
            $save->appointmentTime = $bookedtime;
            $save->appointmentMade = $current;
            $save->diseaseDescription = $request->diseaseDescription;
            $save->appointmentStatus = "0";


           $save->code = SendCode::sendCode($request->mobile);
            $mySave = $save->save();
            $test = DB::table('doctor')->where('softDelete', '=', 0)
                ->where('id', $id)
                ->where('status', '=', 0)->get();
            if ($mySave) {
//            return redirect($this->viewPath . '.OTPVerificationPage');

                return view($this->viewPath . '.OTPVerificationPage', compact('test', 'appointmentNo','number'));
            }
        }
        else{
            return Redirect::back()->with('status','Number is not registered.');
        }
    }

    public function cancelAppointment($id, $userId=null){
        $users = Patient::where('id', $userId)->first();
        $delId = Appointment::findOrFail($id);
        $delId->appointmentStatus = 0;
        $myDel = $delId->update();

        if($myDel){
            //return view('userProfile.myAppointments', compact('users'));
            //return view('userProfile.myAppointments', compact(['users', 'forOthers', 'forMe']));
                return redirect(route('myAppointments', compact('users')));
            }
            else{
                return back();
            }
        }

}

