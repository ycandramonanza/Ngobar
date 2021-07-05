<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     protected function showRegistrationForm(){
         return view('auth.Adminregister');
     }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function register(Request $request){
        $data = $request->all();
        $dataPassword = $data['password'];
        $dataPasswordKonfirmasi = $data['password_confirmation'];
        
        if($dataPassword !== $dataPasswordKonfirmasi){
            return redirect('/register')->with('pesan', "Konfirmasi Password Kamu Salah !");
        }

        $validated = $request->validate([
                'name'                  => 'required',
                'email'                 => 'required|unique:users',
                'password'              => 'required|min:3',
                'password_confirmation' => 'required|min:3'
        ],
        [
                'name.required'                  => 'Nama Tidak Boleh Kosong',
                'email.required'                 => 'Email Tidak Boleh Kosong',
                'email.unique'                   => 'Email Yang Kamu Masukan Sudah Tersedia',
                'password.required'              => 'Password Tidak Boleh Kosong',
                'password_confirmation.required' => 'Password Konfirmasi Tidak Boleh Kosong',
                'password.min'                   => 'Password Minimal 3 Karakter',
                'password_confirmation.min'      => 'Password Konfirmasi Minimal 3 Karakter',
        ]
    
    );

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('Pesan', "Akun Admin Kamu Berhasil di Buat, Silahkan Log In");
    }
}
