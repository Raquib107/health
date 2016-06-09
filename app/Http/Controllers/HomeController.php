<?php

namespace App\Http\Controllers;
use DB;
use App\Doctor;
use App\Service;
use App\Category;
use App\Location;
use App\Chamber;
use App\Schedule;
use App\Appointment;
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

        return redirect(url('/').'/'.'profile');
    }

    //admin page controller
    public function admin()
    {
        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        $doctor2=Doctor::where('validity', '=', 'true')->get();
        $services2=Service::where('validity', '=', 'true')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services, 'members2'=>$doctor2, 'services2'=>$services2));
            }
        }
    }

    public function adminDelete(Request $request)
    {

        Doctor::destroy($request->id);

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        $doctor2=Doctor::where('validity', '=', 'true')->get();
        $services2=Service::where('validity', '=', 'true')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services, 'members2'=>$doctor2, 'services2'=>$services2));
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
        $doctor2=Doctor::where('validity', '=', 'true')->get();
        $services2=Service::where('validity', '=', 'true')->get();
        
        return view('admin',array('members'=>$newdoctor, 'service'=>$services, 'members2'=>$doctor2, 'services2'=>$services2));


    }

    public function serviceDelete(Request $request)
    {

        Service::destroy($request->id);

        $newdoctor=Doctor::where('validity', '=', 'false')->get();
        $services=Service::where('validity', '=', 'false')->get();
        $doctor2=Doctor::where('validity', '=', 'true')->get();
        $services2=Service::where('validity', '=', 'true')->get();
        if (Auth::check())
        {
            if(Auth::user()->role==='admin')
            {
                return view('admin',array('members'=>$newdoctor, 'service'=>$services, 'members2'=>$doctor2, 'services2'=>$services2));
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
        $doctor2=Doctor::where('validity', '=', 'true')->get();
        $services2=Service::where('validity', '=', 'true')->get();
        
        return view('admin',array('members'=>$newdoctor, 'service'=>$services, 'members2'=>$doctor2, 'services2'=>$services2));

    }

    //after requibbox
    public function appointmentPage(Request $request)
    {

        $newdoctor=Doctor::where('id', '=', $request->id)->first();
        //$services=Service::where('validity', '=', 'false')->get();
        $schedules=Schedule::where('Doctor_id', '=', $request->id)->orderBy('day_id')->get();

        $chambers=Chamber::where('Doctor_id', '=', $request->id)->get();
        

        return view('appointment',array('newdoctor'=>$newdoctor, 'chambers'=>$chambers,'schedules'=>$schedules));

    }
    

    public function appointment(Request $request)
    { 

        $count=Appointment::where('Schedule_id', '=', $request->id)->count();
        //echo $count;
        $schedule=Schedule::find($request->id);


        $appointment=new Appointment;
        $appointment->Schedule_id=$request->id;
        $appointment->User_id=Auth::user()->id;
        $appointment->Doctor_id=$schedule->Doctor_id;
        

        $newdoctor=Doctor::where('id', '=', $schedule->Doctor_id)->first();
        //$services=Service::where('validity', '=', 'false')->get();
        $schedules=Schedule::where('Doctor_id', '=', $schedule->Doctor_id)->orderBy('day_id')->get();

        $chambers=Chamber::where('Doctor_id', '=', $schedule->Doctor_id)->get();

        if($count < $schedule->Up_limit)
        {
            $appointment->Serial=$count+1;
            $appointment->save();
            return view('appointment',array('newdoctor'=>$newdoctor, 'chambers'=>$chambers,'schedules'=>$schedules, 'msg'=>'Your appointment has been saved'));
        }
        else
        {
            return view('appointment',array('newdoctor'=>$newdoctor, 'chambers'=>$chambers,'schedules'=>$schedules, 'msg'=>'Your appointment has not been saved'));

        }
    }

    //profile edit page
    public function editProfilePage()
    {

        if (Auth::check())
        {
            return view('editprofile', array('user'=>Auth::user()));
        }
        return view('home');
    }

    
    public function editProfile(Request $data)
    {

        if (Auth::check())
        {
            $this->validate($data, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',

                'first' => 'required',
                'last' => 'required',
                ]);

            $user=Auth::user();
            $user->name= $data['name'];
            $user->email= $data['email'];
            $user->phone= $data['phone'];
            $user->First_name= $data['first'];
            $user->Last_name= $data['last'];
            
            $user->save();

            return redirect(url('/').'/'.'home');
        }
        return view('home');
    }


    //doctor data update
    public function doctorEditProfilePage()
    {

        $location = Location::lists('Location_name');
        if (Auth::check())
        {
            $doctor=Doctor::where('user_id', '=', Auth::user()->id)->first(); //get dile collection return kore, oita array r moto access na korle collection:id ei error dibe
            $chambers=Chamber::where('Doctor_id', '=', $doctor->id)->get(); 
            $schedules=Schedule::where('Doctor_id', '=', $doctor->id)->get();
            
            
            if($doctor!==null)
            {

                return view('doctoreditprofile', array('doctor'=>$doctor, 'location'=>$location, 'chamber'=>$chambers, 'schedules'=>$schedules));
                
            }
        }
        return view('home');
    }

    //not checked yet
    public function addChamber(Request $data)
    {

        if (Auth::check())
        {
            $this->validate($data, [
                'location' => 'required',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                ]);

            $doctor=Doctor::where('user_id', '=', Auth::user()->id)->first();
            $chamber=new Chamber;
            $chamber->Doctor_id= $doctor->id;
            $chamber->Location_id= $data['location'];
            $chamber->Chamber_name= $data['name'];
            $chamber->Full_address= $data['address'];
            $chamber->phone= $data['phone'];
            $chamber->save();

            return redirect(url('/').'/'.'home');
        }
        return view('home');
    }

    
    public function addSchedule(Request $data)
    {

        if (Auth::check())
        {
            $this->validate($data, [
                'chamber' => 'required',
                'time' => 'required',
                'limit' => 'required',
                ]);

            $doctor=Doctor::where('user_id', '=', Auth::user()->id)->first();

            $schedule=new Schedule;
            $schedule->Doctor_id= $doctor->id;
            $schedule->Chamber_id= $data['chamber']+1;
            //echo $data['chamber'];
            $schedule->day_id=$data['day'];
            $schedule->Time= $data['time'];
            $schedule->Up_limit= $data['limit'];

            $schedule->save();


            return redirect(url('/').'/'.'home');
        }
        return view('home');
    }

    public function editSchedule(Request $data)
    {

        if (Auth::check())
        {
            $this->validate($data, [
                'time' => 'required',
                'limit' => 'required',
                ]);

            //echo $data->schedule;
            $doctor=Doctor::where('user_id', '=', Auth::user()->id)->first();
            $old=Schedule::where('id', '=', $data->schedule)->first();

            $schedule=new Schedule;
            //echo $data['chamber'];
            $schedule->day_id=$data['day'];
            $schedule->Time= $data['time'];
            $schedule->Up_limit= $data['limit'];
            $schedule->Doctor_id= $old->Doctor_id;
            $schedule->Chamber_id=$old->Chamber_id;


            $schedule->save();
            Schedule::destroy($data->schedule);


            return redirect(url('/').'/'.'home');
        }
        return view('home');
    }

    //user appointment deleting
    public function userAppointmentDelete(Request $request)
    {

        Appointment::destroy($request->id);

        $appointments=Appointment::where('User_id','=',auth::user()->id)->get();


        return  view('show_app', array('appointments' =>$appointments, 'msg'=>'appointment deleted'));
        
    }

    public function doctorScheduleDelete(Request $request)
    {

        $deletedRows = Appointment::where('Schedule_id', $request->id)->delete();

        $doc=Doctor::where('User_id','=',auth::user()->id)->first();
        $schedules=Schedule::where('Doctor_id', '=', $doc->id)->orderBy('day_id')->get();
        $chambers=Chamber::where('Doctor_id', '=', $doc->id)->get();

        return view('show_schedule',array('chambers'=>$chambers,'schedules'=>$schedules));
        
    }


}
