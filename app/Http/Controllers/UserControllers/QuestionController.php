<?php

namespace App\Http\Controllers\UserControllers;

use App\model\Patient;
use App\model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\model\doctor;

use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    //
    public function getAskQuestionsPage($id){
        $users = Patient::where('id', $id)->first();

        $getDoctors = DB::table('appointment')
            ->join('doctor','doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile',$users->mobile)
            ->select('doctor.id','doctor.name','doctor.specialization','doctor.image')->distinct()->get();


        $getQuestions = DB::table('patient')
            ->join('question', 'patient.id', '=', 'question.patientId')
            ->join('doctor', 'question.doctorId', '=', 'doctor.id')
            ->select('doctor.name', 'question.question', 'question.response', 'question.id')
            ->where('question.patientId', $id)
            ->get();

        return view('userProfile.AskQuestions',compact(['users','getDoctors','getQuestions']));
    }

    public function getQuestionsPage($id, $docId){
        $users = Patient::where('id', $id)->first();

        $getDoctors = DB::table('appointment')
            ->join('doctor','doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile',$users->mobile)
            ->select('doctor.id','doctor.name','doctor.specialization','doctor.image')->distinct()->get();
        $getQuestions = DB::table('patient')
            ->join('question', 'patient.id', '=', 'question.patientId')
            ->join('doctor', 'question.doctorId', '=', 'doctor.id')
            ->select('doctor.name', 'question.question', 'question.response', 'question.id')
            ->where('question.patientId', $id)
            ->where('question.doctorId', $docId)->get();
        $chosenDoc= doctor::where('id', $docId)->first();

        return view('userProfile.questions', compact(['users','getDoctors','chosenDoc','getQuestions','docId']));
    }

    public function sendQuestion($id, $docId, Request $request){

        $getQuestions = DB::table('patient')
            ->join('question', 'patient.id', '=', 'question.patientId')
            ->join('doctor', 'question.doctorId', '=', 'doctor.id')
            ->select('doctor.name', 'question.question', 'question.response', 'question.id')
            ->where('question.patientId', $id)
            ->where('question.doctorId', $docId)->get();
        $users = Patient::where('id', $id)->first();


        $getDoctors = DB::table('appointment')
            ->join('doctor','doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile',$users->mobile)
            ->select('doctor.id','doctor.name','doctor.specialization')->get();

        $ask = new Question();
        $ask->doctorId = $docId;
        $ask->patientId = $id;
        $ask->question = $request->question;
        $mysave = $ask->save();

        if ($mysave){
            return redirect(route('getQuestions', compact('users','getDoctors','getQuestions','docId')));
//            return view('userProfile.AskQuestions',compact(['users','getDoctors','getQuestions']));
        }

    }



    public function getDoctorQuestions($id,$docId){

        $getQuestions = DB::table('patient')
            ->join('question', 'patient.id', '=', 'question.patientId')
            ->join('doctor', 'question.doctorId', '=', 'doctor.id')
            ->select('doctor.name', 'question.question', 'question.response', 'question.id')
            ->where('question.patientId', $id)
            ->where('question.doctorId', $docId)

            ->get();

        $users = Patient::where('id', $id)->first();
        $getDoctors = DB::table('appointment')
            ->join('doctor','doctor.id', '=', 'appointment.doctorId')
            ->where('appointment.mobile',$users->mobile)
            ->select('doctor.id','doctor.name','doctor.specialization')->get();

        return redirect(route('askQuestions', compact('users','getDoctors','getQuestions')));
    }
}
