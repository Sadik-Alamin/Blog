<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
   	public function create(){
   		return view('registration.create');
   	}
   	public function store(RegistrationRequest $request){
   		
         $request->presist();

         session()->flash('message','Successfull signup..!!!');

   		return redirect('/');
   	}
}
