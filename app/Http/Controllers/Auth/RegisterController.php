<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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


    protected function register(Request $request){

    if($request->role == 'User'){

            // Validasi User Semua inputan Tidak Boleh Kosong
                if($request->name == Null || $request->email == Null || $request->password == Null ||$request->password_confirmation == Null){

                    Alert::warning('Oops.. !', 'Kalau Mau Daftar Akun Semua  wajib di isi.');
                    return redirect('/Ngobar.com');
                }
            
            // Validasi Username Tidak Boleh Ada Spasi
            if(!preg_match("/^[a-zA-Z0-9]*$/", $request->name)){
                Alert::warning('Oops.. !', 'Username  Tidak Boleh Menggunakan spasi dan karakter, Hanya boleh Huruf Dan Angka.');
                return redirect('/Ngobar.com');
            }

            // Cek Username User Register Apakah Ada di Database
            $Usernames = User::where('name', $request->name)->first();
            $count = User::where('name', $request->name)->count();
            if($count == true){
                $Username  = $Usernames->name;
                if($Username == $request->name){
                    Alert::warning('Oops.. !', 'Username Sudah Ada, Silahkan Gunakan Username Yang Lain.');
                    return redirect('/Ngobar.com');
                }    
            }

            // Cek Email User Register Apakah Ada di Database
            $Users = User::where('email', $request->email)->first();
            $count = User::where('email', $request->email)->count();
                if($count == true){
                    $User  = $Users->email;
                    if($User == $request->email){
                        Alert::warning('Oops.. !', 'Email Sudah Terdaftar, Silahkan Gunakan Email Yang Lain.');
                        return redirect('/Ngobar.com');
                    }    
                }

            // Mengkonversi data objek menjadi Array
                $data = $request->all();
                $dataPassword = $data['password'];
                $dataPasswordKonfirmasi = $data['password_confirmation'];

            // Menghitung Jumlah karakter di dalam tipe data string
                $dataKarakter  = strlen($dataPassword);
            // Validasi  Konfirmasi Password User
                if($dataPassword !== $dataPasswordKonfirmasi){
                    if($data['role'] == 'User'){
                        Alert::warning('Oops!', 'Konfirmasi Password Salah');
                        return redirect('/Ngobar.com');
                    }else{
                        return redirect('/register')->with('pesan', "Konfirmasi Password Kamu Salah !");
                    }
                }elseif($dataKarakter < 3){
                    Alert::warning('Oops!', 'Password Tidak Boleh Kurang Dari 3 Karakter');
                    return redirect('/Ngobar.com')->with('pesan', "Konfirmasi Password Kamu Salah !");
                }

            $datas = User::create([
                    'role'     => $data['role'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'password' => Hash::make($data['password']),
                    'status'   => 'Basic',
                ]);

                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    Alert::success('Login Suksess', 'Selmat Datang '. $request->name);
                    return redirect()->route('Profile-User');
                }

       
     
    }elseif($request->role == 'Mentor'){
        
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

        if($request->password !== $request->password_confirmation){

            return redirect()->route('Register-Mentor')->with('pesan', 'Konfirmasi Password Salah');

        }

         // Validasi Username Tidak Boleh Ada Spasi
         if(!preg_match("/^[a-zA-Z0-9]*$/", $request->name)){
            return redirect()->route('Register-Mentor')->with('pesan', 'Username Tidak Boleh Ada Spasi');
        }


        User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'Tamu',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('Login-Mentor')->with('Pesan', "Akun Mentor Kamu Berhasil di Buat, Silahkan Log In");
    }
   


    

    }
}
