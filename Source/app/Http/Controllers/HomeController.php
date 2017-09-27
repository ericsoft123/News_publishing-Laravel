<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CreateDatabase;
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
        return view('home');
    }
	//my function
	public function register(Request $request)
	{
		$validator=$this->validator($request->all());
		if($validator->fails())
		{
			$this->throwValidationException($request,$validator);
		}
		$user=$this->create($request->all());
		
	}
	
}
