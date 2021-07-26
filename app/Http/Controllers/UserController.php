<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kelas;
use App\Models\materikelas;
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

                    $kelas = kelas::where('progres', 'Publish')->orWhere('progres', 'Update Kelas')->orWhere('progres', 'Update DiTolak')->orderBy('id', 'DESC')->paginate(3);

    
                    return view('Website.profileUser', compact('salam', 'kelas'));

            }elseif(Auth::user()->status == 'Nonaktif'){
                    return redirect()->back();
            }
            
                    

        }


    }
}
