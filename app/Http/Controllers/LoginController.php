<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Sector;

class LoginController extends Controller
{
    public function index()
    {
    	 $sector = Sector::where('id', \Auth::user()->sector_id)->first();
 		   return view('dashboard',['sector' => $sector]);
	  }

	 public function login(Request $request)
	 {
	 		/*----------- LOGIN MANUAL , MODIFICABLE ----------*/
    	$this->validate($request, [
    		'usuario' =>'required',
    		'password' => 'required',
    	]);

      if (Auth::attempt($request->only(['usuario','password']))){
      	return redirect()->intended('dashboard');
      }else{
      	return redirect()->route('login')->withErrors('¡Error! , Revise sus credenciales');
      }
	 }

	 public function logout()
	 {
	 		/*---- funcion de salir/logout/cerrar sesion --*/
	 		Auth::logout();
	 		return view('login');
	 }
    
}
