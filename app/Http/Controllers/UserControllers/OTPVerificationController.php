<?php

namespace App\Http\Controllers\UserControllers;

use App\BookedMessage;
use App\model\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Exception;

class OTPVerificationController extends Controller
{
    //
    public function verifyOTP(Request $request, $appointmentNo, $mobile)
    {

        $user = Appointment::where('code', $request->code)->first();

            if ($user) {
                $user->appointmentStatus = 1;
                $user->code = null;
                $user->save();

                $appointmentDetails = DB::table('appointment')
                    ->join('doctor', 'appointment.doctorId', '=', 'doctor.id')
                    ->where('appointment.appointmentNo', $appointmentNo)->first();

                BookedMessage::sendMessage($mobile,$appointmentDetails);
                return view('User.home');
            }

            elseif ($user == null){
                return redirect()->route('book')->with('status','OTP code Invalid,Please re-book.');
            }

    }
}

