<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doctor;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class newController extends Controller
{
    //
	public function profile(){
		if (Auth::check())
		{
			
			if(Auth::user()->role==='doctor')
			{
				
	            $newdoctor=Doctor::where('user_id', '=', Auth::user()->id)->first(); //get dile collection return kore, oita array r moto access na korle collection:id ei error dibe
	            $schedule=Schedule::where('Doctor_id', '=', $newdoctor->id)->get();
	            if($newdoctor!==null)
	            {
	            	return view('doctorprofile',array('doctor'=> $newdoctor, 'schedules'=>$schedule));
	            	echo Auth::user()->id;
	            }
	        }
	        else if(Auth::user()->role==='user')
	        {
	        	return view('userprofile', ['user' => Auth::user()]);
	        	
	        }

	    }
	}

	public function doctorPage(Request $request){

		$newdoctor=Doctor::find($request->id); 
		if($newdoctor!==null)
		{
			//echo $request;
			return view('doctor1', ['doctor' => $newdoctor]);
		}

	}
}
