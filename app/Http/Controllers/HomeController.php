<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Service;
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

        if (Auth::check())
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
        }

        //redirect the admin to admin page from /home
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return redirect(url('/').'/'.'admin');
            }
        }

        return view('home');
    }

    //admin page controller
    public function admin()
    {
        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services));
            }
        }
    }

    public function adminDelete(Request $request)
    {

        Doctor::destroy($request->id);

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services));
            }
        }
        
    }

    public function adminVerify(Request $request)
    {

        $newdoctor=Doctor::find($request->id);

        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                $newdoctor->validity='true';
                $newdoctor->save();
            }
        }

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        
        return view('admin',array('members'=>$newdoctor, 'service'=>$services));
            

    }

    public function serviceDelete(Request $request)
    {

        Service::destroy($request->id);

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services));
            }
        }
        
    }

    public function serviceVerify(Request $request)
    {

        $newdoctor=Service::find($request->id);

        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                $newdoctor->validity='true';
                $newdoctor->save();
            }
        }

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        
        return view('admin',array('members'=>$newdoctor, 'service'=>$services));
            
    }

}
