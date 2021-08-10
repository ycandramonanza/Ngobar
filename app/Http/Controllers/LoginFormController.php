<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginFormController extends Controller
{
    

    
    public function LoginAdmin(){
        if(Auth::guest()){
            return view('Admin.AdminLogin');
        }
    }

    public function LoginMentor(){

        if(Auth::guest()){
            return view('Mentor.MentorLogin');
        }
       
    }

    public function RegisterMentor(){
        if(Auth::guest()){
            return view('Mentor.MentorRegister');
        } 
    }
}
