<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

    	 /*if(Auth::check()){
            Auth::logout();
        }*/
 		return view('dashboard');
	 }


	 public function login()
	 {
	 	/*----------- LOGIN MANUAL , MODIFICABLE ----------*/

	 	//attemp suelta un booleano
    	//dd($request->all());

    	$this->validate($request, [

    		'email' =>'required|email',
    		'password' => 'required|max:8',

    		]);

	        if (Auth::attempt($request->only(['email' , 'password'])))
	        {
	        	return redirect()->intended('dashboard');
	            
	        }else{

	        	return redirect()->route('index_show_login')->withErrors('An error has occurred, check your credentials');
	        }
	 }

	 public function logout()
	 {
	 	/*---- funcion de salir/logout/cerrar sesion --*/
	 	Auth::logout();
	 	return view('login');

	 }
    
}
