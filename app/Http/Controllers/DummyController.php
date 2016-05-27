<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests;

class DummyController extends Controller
{
	public function dummy(Request $request)
	{
    	// echo $request['name'];
     //    echo $request['doctor'];
		echo $request['category'];
	}

	protected function serviceCreate(Request $data)
	{
		$doctor=new Service;

		$doctor->validity="false";
		$doctor->name= $data['name'];
		$doctor->Location_id= $data['location']+1;
		$doctor->type= $data['type']+1;
		$doctor->license= $data['license'];
		$doctor->address= $data['address'];
		$doctor->Contact_no= $data['contact'];
		$doctor->email= $data['email'];
		$doctor->save();

		echo "saved successfully";

		return redirect(url('/').'/'.'serviceRegister');
	}
}
