<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DummyController extends Controller
{
    public function dummy(Request $request)
    {
    	// echo $request['name'];
     //    echo $request['doctor'];
        echo $request['category'];
    }
}
