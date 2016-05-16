<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        
        $newdoctor=Doctor::where('user_id', '=', Auth::user()->id)->first(); //get dile collection return kore, oita array r moto access na korle collection:id ei error dibe
        if($newdoctor!==null)
        {
            if($newdoctor->validity==='false')
            {
                Auth::logout();
                return view('home')->with('msg', 'Your account is registered successfully, wait for verification');
            }
        }

        return view('home');
    }
}
