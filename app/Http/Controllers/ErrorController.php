<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ErrorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page1(){

        if(Auth::user()->role == 'Mentor'){

            if(Auth::user()->status == 'Nonaktif'){
                return view('PageNotFound.Page1');
            }

        }elseif(Auth::user()->role == 'User'){
            return view('PageNotFound.Page2');
        }
       

    }
}
