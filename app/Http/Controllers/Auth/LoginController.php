<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        // Alert::warning('Oops!', 'Harus Login Dulu Ya');
        return view('Website.index');
    }




    public function login(request $request){

        // Vlidasi Login Admin Mentor, ELSE USER
        if($request->role == 'Admin' || $request->role == 'Mentor'){

            $validated = $request->validate([
                'name'    => 'required',
                'password' =>  'required'
            ],
            [
                'name.required'    => 'Email Tidak Boleh Kosong',
                'password.required' => 'Password Tidak Boleh Kosong'
            ]
        );
        }else{

                // Validasi tidak ada inputan yang di masukan
                if ($request->name == Null && $request->password == TRUE){
                    Alert::error('Username/Email, ', 'Wajib di Isi');
                    return redirect()->route('Landing-Page');

                }elseif ($request->password == Null && $request->name == TRUE) {
                    Alert::error('Password ', 'Wajib di Isi');
                    return redirect()->route('Landing-Page');
                }elseif($request->password == Null || $request->name == Null){
                    Alert::error('Usename/Email, Password', 'Wajib di Isi');
                    return redirect()->route('Landing-Page');
                }

        }


        // Loginnnn..

        $getName =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $roles =  User::where($getName, $request->name )->first();

        // Validasi apakah data ada di database atau tidak;
        if($request->role == 'Admin' || $request->role == 'Mentor'){
            if($roles == Null){
                if($request->role == 'Admin'){
                    return redirect()->route('Login-Admin')->with('validasi', 'Username, Email / Password Yang Kamu Masukan Salah.');
                }else{
                    return redirect()->route('Login-Mentor')->with('validasi', 'Username, Email / Password  Yang Kamu Masukan Salah.');
                }
            }
        }else{
            if($roles == Null){
                Alert::error('Oopss..! ', 'Username,Email/Password Salah');
                return redirect()->route('Landing-Page');
            }
        }
    

        $role = $roles->role;
        // Validasi Antar Form untuk membatasi hak akses masuk sesuai dengan role nya. 
        if($request->role == 'Admin'){
            if($role != 'Admin'){
                    return redirect()->route('Login-Admin')->with('validasi', 'Username, Email / Password Yang Kamu Masukan Salah');
            }
        }elseif($request->role == 'Mentor'){
            if($role != 'Mentor'){
                return redirect()->route('Login-Mentor')->with('validasi', 'Username, Email / Password Yang Kamu Masukan Salah');
            }
        }else{
            if($role != 'User'){
                Alert::error('Oopss..! ', 'Username,Email/Password Salah');
                return redirect()->route('Landing-Page');
            }
             
        } 
    
        if($role === "Mentor"){
            
                    $input = $request->all();
                    // Passing ke Sweet Alert untuk mendapatkan name User
                    $getName =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
                    $nameMentor =  User::where($getName, $request->name )->first();
                    $name     = $nameMentor->name;
                    $status   = $nameMentor->status;
                   

                    if(auth()->attempt(array($getName => $input['name'], 'password' => $input['password']))){
                                
                                if(Auth::user()->status == 'Aktif'){
                                    Alert::success('Selamat Datang '. $name, ' Berhasil Login');
                                    return redirect()->route('Profile-Mentor');
                                }elseif(Auth::user()->status == 'Tamu'){
                                    Alert::success('Semoga Sukses '. $name, ' Berhasil Login');
                                    return redirect()->route('Formulir');

                                }elseif(Auth::user()->status == 'Validasi Gagal'){
                                    alert()->error('Validasi Di Tolak ', $name.' Maaf Kamu Tidak Memenuhi Persyaratan Yang Kami Tentukan, Bila Kamu ada kesalahan saat mengirim data, silahkan di coba lagi.');
                                    return redirect()->route('Formulir');

                                }elseif(Auth::user()->status == 'Nonaktif'){
                                    return redirect()->route('Page1');

                                }elseif(Auth::user()->status == 'Validasi'){

                                    Alert::success('Sedang dalam Proses Validasi ', $name .' Berhasil Login');
                                    return redirect()->route('Formulir');

                                }else{

                                    Alert::success('Selamat Kamu Di Terima '. $name, 'Sekarang Akun Kamu Aktif');
                                    return redirect()->route('Formulir');
                                }
                     }
    
        }elseif($role === "User"){

                    // Passing ke Sweet Alert untuk mendapatkan name User
                    $getName =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
                        $nameUser =  User::where($getName, $request->name )->first();
                        $name     = $nameUser->name;
                    

                        $input = $request->all();
                        
                    //  Ambil data untuk di Passing di sweetAlert/ menentukan email atau usename yang salah input
                        $data =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'Email' : 'Username';
                    // End Passing Data

                        $fieldType =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
                        
                        if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])))
                        {
                                if(Auth::user()->status == 'Basic' || Auth::user()->status == 'Premium' ){
                                    Alert::success('HI :) '. $name, 'Berhasil Login');
                                    return redirect()->route('Profile-User');
                                }else if(Auth::user()->status == 'Nonaktif' ){
                                    return redirect()->route('Page1');
                                }
                                    


                        }else{
                            Alert::error($data . ', Password', 'Yang Kamu Masukan Salah');
                            return redirect()->route('Landing-Page');
                        }


        }elseif($role === "Admin"){

                            $validated = $request->validate([
                                'name'    => 'required',
                                'password' =>  'required'
                            ],
                            [
                                'name.required'    => 'Email/Username Tidak Boleh Kosong',
                                'password.required' => 'Password Tidak Boleh Kosong'
                            ]
                        );

                        $input = $request->all();
                        $fieldType =  filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

                        if (auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password']))) {
                            $request->session()->regenerate();
                            Alert::success('Selamat Bekerja :) ', 'Berhasil Login');
                            return redirect()->route('home');
            
                        }else{
            
                            return redirect()->route('Login-Admin')->with('validasi', 'Email / Password Salah');
                        }


        }

    }

    public function logout(Request $request){

    //    $nameThanks = $request->name;

    //     if(Auth::user()->role == 'User'){
    //         Auth::logout();
    //         $request->session()->flush();
    //         $request->session()->regenerate();
    //         return view('Website.indexThanks', compact('nameThanks'));
    //     }elseif(!Auth::guest()){
    //         return redirect('/Ngobar.com');
    //     }
    //     Auth::logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     $request->session()->flash('Logout', "Anda Berhasil Log Out");
    //     return redirect()->route('Thanks-Page');
    }
}
