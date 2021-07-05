<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm(){
        return view('auth.Adminlogin');
    }

    public function login(request $request){
          
        $validated = request()->validate([
                'email' => 'required',
                'password' => 'required|min:3',
        ],
        [
            'email.required'    => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong', 
            'password.min' => 'Password Minimal 3 Karakter',
         ]
    );
       
        if(Auth::attempt($validated)){
                return redirect('/Dashboard-Admin');
        }else {
            $emailAdmin = User::where('email', $request->email)->first();
            if($emailAdmin == false ){
                return redirect('/login')->with('validasi', " Email / Password Yang Kamu Masukan Salah");
            }

            $cekPassowrd =  Hash::check($request->password, $emailAdmin->password);
            if($cekPassowrd == false){
                    return redirect('/login')->with('validasi', " Email / Password Yang Kamu Masukan Salah");
            }
            
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        $request->session()->flash('Logout', "Anda Berhasil Log Out");
        return redirect('/login');
    }
}
