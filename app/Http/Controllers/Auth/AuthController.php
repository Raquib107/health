<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Doctor;
use App\Category;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */


    //------------changed it---------------
    protected function create(array $data)
    {
        $newuser= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

       

        if($data['type']==='doctor')
        {
         $doctor=new Doctor;
         
         $doctor->validity="false";
         $doctor->user_id= $newuser->id;
         $doctor->Category_id= $data['category']+1;
         $doctor->reg_no= $data['Registration'];
         $doctor->Affiliation= $data['Affiliation'];
         $doctor->save();
         $newuser->role="doctor";
         $newuser->save();
        }
        else
        {
            $newuser->role="user";
            $newuser->save();
        }

        
        //echo "yes";
        return $newuser;
    }

    //------------new addition, overriding trait's methods---------------

    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        $category = Category::lists('Speciality');



        return view('auth.register')->with('categories', $category);
    }



    // public function register(Request $request)
    // {
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         $this->throwValidationException(
    //             $request, $validator
    //         );
    //     }

    //     Auth::guard($this->getGuard())->login($this->create($request->all()));

    //     return redirect($this->redirectPath());
    // }

}
