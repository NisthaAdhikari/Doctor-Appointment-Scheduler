<?php

namespace App\Http\Controllers\admin;

use App\model\doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    //
    protected $filePath    = 'admin.doctor';
    protected $tablename    = 'doctor';
    protected $imagePath;

    public function __construct()
    {
        $this->middleware('auth');
        $this->colorCode = config('activityMessage.colorCode');
        $this->imagePath = config('activityMessage.doctorImagePath');
    }

    public function index(){
        $page['page_title']          = config('app.name') . ': Doctors list';
        $page['page_description']    = config('app.name') . ': Doctors list,  Doctor Appointment Scheduler';

        $doctors = doctor::orderby('name', 'ASC')->where(['softDelete' => 0])->paginate(config('activityMessage.pagination'));
        return view($this->filePath . '.index', compact(['page','doctors']));
    }

    public function store(Request $request){
        $save = new doctor;
        $save->name       = $request->name;
        $save->email       = $request->email;
        $save->doctorPassword = Hash::make($request->doctorPassword);
        $save->clinic       = $request->clinic;
        $save->clinicAddress       = $request->clinicAddress;
        $save->mobile       = $request->mobile;
        $save->specialization       = $request->specialization;
        $save->experience       = $request->experience;
        if ($request->hasFile('imagePath')) {
            $image = $request->file('imagePath');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . "." . $ext;
            $uploadPath = public_path('lib/images');
            $image->move($uploadPath, $imageName);
            $save->image = $imageName;
        }

        $mySave = $save->save();

        if ($mySave) {
            return back()->withMessage(config('activityMessage.saveMessage') . $request->name);
        }else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }
    }

    public function update(Request $request)
    {

        $data = $request->except('_token');

        $myData = doctor::findOrFail($data['doctorId']);

        if($myData){

            if ($request->hasFile('imagePath')) {
                $image = $request->file('imagePath');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . "." . $ext;
                $uploadPath = public_path('lib/images');
                $image->move($uploadPath, $imageName);
                $myData->image = $imageName;
            } else {
                $myData->image = $request->oldImage;
            }

            $myData->name = $data['name'];
            $myData->email = $data['email'];
            //$myData->doctorPassword = $data['doctorPassword'];
            $myData->clinic = $data['clinic'];
            $myData->clinicAddress = $data['clinicAddress'];
            $myData->mobile = $data['mobile'];
            $myData->specialization = $data['specialization'];
            $myData->experience = $data['experience'];

            $myData->save();
            $save=true;
        }
        else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }

        if ($save) {
            return back()->withMessage(config('activityMessage.updateMessage') . $request->name);
        }else{
            return back()->withMessage(config('activityMessage.unSaveMessage'));
        }
    }

    public function destroy($id)
    {
        $delId = doctor::findOrFail($id);
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
