<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard()
    {
        $page['page_title']          = config('app.name') . ': Admin - Dashboard';
        $page['page_description']    = config('app.name') . ': Doctor Appointment Scheduler ';

        return view('main.layout');
    }
}
