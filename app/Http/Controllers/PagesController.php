<?php

namespace App\Http\Controllers;

use App\Location;
use App\Category;
use App\ServiceType;
use App\Appointment;
use App\Schedule;
use App\Chamber;
Use App\User;
Use App\Doctor;
Use App\Service;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    //
    public function search(Request $request)
    {
    	$locations= Location::all();
    	$categories=Category::all();
    	$types=ServiceType::all();

    	//$alldata=Service::all();

    	$location_id= $request->input('location_new');
    	$type_id=$request->input('service_type');
    	
    //	echo $type_id;
    //	echo $location_id;

      if(!empty($location_id))
      {


          if(!empty($type_id))
          {
    		//echo $type_id;
            $alldata=Service::where('type','=',$type_id)->where('Location_id','=',$location_id)->orderBy('name')->get();
            return view('search', array('locations' =>$locations ,'types'=>$types,'categories'=>$categories,'alldata'=>$alldata ) );

        }

    }
    else
    {
      return view('search', array('locations' =>$locations ,'types'=>$types,'categories'=>$categories ) );
  }
}
public function search_doctor(Request $request)
{
    $locations= Location::all();
    $categories=Category::all();
    $types=ServiceType::all();
    $category_id= $request->input('category');

    if(!empty($category_id))
    {

     //   $members=Doctor::where('Category_id','=',$category_id)->get();


         $members = \DB::table('doctors')
            ->where('Category_id','=',$category_id)
           ->join('users', 'doctors.user_id', '=', 'users.id')
            ->select('doctors.id as doctor_id', 'users.id as user_id','users.First_name','users.email','doctors.Visit','doctors.Affiliation')
            ->orderBy('users.First_name')
            ->get();

    
        return view('search', array('locations' =>$locations ,'types'=>$types,'categories'=>$categories,'members'=>$members ) );
    }
    else
    {
        return view('search', array('locations' =>$locations ,'types'=>$types,'categories'=>$categories ) );
    }

}

public function show_user_app()
{

    $appointments=Appointment::where('User_id','=',auth::user()->id)->get();


    return  view('show_app', array('appointments' =>$appointments ) );
}
public function show_doc_app()
{

    $doc=Doctor::where('User_id','=',auth::user()->id)->first();

        //$services=Service::where('validity', '=', 'false')->get();
        $schedules=Schedule::where('Doctor_id', '=', $doc->id)->orderBy('day_id')->get();

        $chambers=Chamber::where('Doctor_id', '=', $doc->id)->get();
       


    return view('show_schedule',array('chambers'=>$chambers,'schedules'=>$schedules));
}




}


