<?php

namespace App\Http\Controllers\UserControllers;

use App\model\doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function search(Request $request,$specialization=null)
    {

        if ($specialization) {
            $getDoc = DB::table('doctor')->where('specialization', $specialization)->get();
            return view('User.searchedDoctors', compact('getDoc'));
        }

        if ($request->specialization == null) {
            return redirect(route('book'));
        } else {
            $getDoc = DB::table('doctor')->where('specialization', $request->specialization)

                ->get();

            return view('User.searchedDoctors', compact('getDoc'));
        }
    }

        function fetch(Request $request)
        {

            if($request->get('query'))
            {
                $query = $request->get('query');
                $data = DB::table('doctor')
                    ->where('specialization', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach($data as $row)
                {
                    $output .= '
       <li><a href="#">'.$row->specialization.'</a></li>
       ';
                }
                $output .= '</ul>';
                echo $output;
            }
        }


    public function autocomplete(Request $request)
    {
        $data = Doctor::select("specialization as name")
            ->where("specialization","LIKE","{$request->input('query')}%")

            ->distinct()->get();

        return response()->json($data);
    }






}
