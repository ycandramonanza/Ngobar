<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
class UserController extends Controller
{
   
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function ProfileUser(){
        

        if(Auth::user()->role == 'User'){


            if(Auth::user()->status == 'Basic' || Auth::user()->status == 'Premium' ){

               
                    // Menentukan Jam
                    $jam = Carbon::now()->isoFormat('HH:mm');
                    if ($jam > '05:00' && $jam < '10:00') {
                        $salam = 'Pagi';
                    } elseif ($jam >= '10:00' && $jam < '15:00') {
                        $salam = 'Siang';
                    } elseif ($jam >= '15:00' && $jam < '18:00') {
                        $salam = 'Sore';
                    } else {
                        $salam = 'Malam' ;
                    }
                    return view('Website.profileUser', compact('salam'));

            }elseif(Auth::user()->status == 'Nonaktif'){
                    return redirect()->back();
            }
            
                    

        }


    }
}
