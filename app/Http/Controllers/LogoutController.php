<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Auth;
class LogoutController extends Controller
{
    public function ThanksPage(Request $request){

        $nameThanks = $request->name;

            if(Auth::user()->role == 'User'){

                if(Auth::user()->status == 'Basic' || Auth::user()->status == 'Premium'){

                    Auth::logout();
                    $request->session()->flush();
                    $request->session()->regenerate();
                    return Redirect::route('Thanks-Page-Logout')->with(['nameThanks' => $nameThanks]);

                }else{

                    Auth::logout();
                    $request->session()->flush();
                    $request->session()->regenerate();
                    return redirect('/Ngobar.com');
                }
               

            }elseif(Auth::user()->role == 'Mentor'){
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect()->route('Login-Mentor');

            }else{
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect()->route('Login-Admin');
            }
      
    }

    public function ThanksPageNew(){
        return view('Website.indexThanks');
    }
}
