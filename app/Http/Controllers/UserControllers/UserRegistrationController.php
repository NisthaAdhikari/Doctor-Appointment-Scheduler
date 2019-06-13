<?php

namespace App\Http\Controllers\UserControllers;

use App\model\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\doctor;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
class UserRegistrationController extends Controller
{
    //
    protected $viewPath     = 'User';

    public function saveData(Request $request){
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'email' => 'required|unique:doctor,email|email',
            'mobile' => 'required|regex:/(98)[0-9]{8}/',
            'doctorPassword' => 'required|alphaNum|min:3'
        ]);
        $doctor = new doctor;
        $doctor->name = $request->name;
        //$doctor->streetAddress  = $request->address;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $password = Hash::make($request->doctorPassword);
        $doctor->doctorPassword = $password;
        $doctor->status = 0;
        $doctor->softDelete = 0;
        $mySave = $doctor->save();
        if ($mySave) {
            return view($this->viewPath . '.login');
            }
    }

    public function savePatientData(Request $request){
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'email' => 'required|unique:patient,email|email',
//            'mobile' => 'required|regex:/(98)[0-9]{8}/',
            'mobile' => 'required|unique:patient|max:10',
            'patientPassword' => 'required|alphaNum|min:3',
        ]);

//        dd($request);

        $patient = new Patient();
        $patient->name = $request->name;

        $patient->email = $request->email;
        $patient->mobile = $request->mobile;
        $password= Hash::make($request->patientPassword);
        $patient->patientPassword = $password;

        $mySave = $patient->save();
        if ($mySave) {
            return view($this->viewPath . '.login');
        }
    }
}
