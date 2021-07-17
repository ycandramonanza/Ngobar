<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cvMentor;
use App\Models\mentor;
use App\Models\kelas;
use App\Models\visitWeb;
use Response;
use Auth;
class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function visit(){
        $data = visitWeb::all();

        return view('Admin.visit', compact('data'));
    }



    public function mentorAll(){

        if(Auth::user()->role == 'Admin'){
            $data = User::where('role','Mentor')->orderBy('id', 'DESC')->get();
            return view('Admin.tableMentorAll', compact('data'));
        }

    }


    public function validasiMentor(){

        if(Auth::user()->role == 'Admin'){
            $data = cvMentor::where('status_validasi', 1)->get();
            return view('Admin.tableValidasiMentor', compact('data'));
        }
    }


    public function getDownload(cvMentor $download){

        $PDF = $download->dokument;
     
    //PDF file is stored under project/public/download/info.pdf
    $file= public_path(). "/storage/CV/". $PDF ;
  
    $headers = array(
              'Content-Type: application/pdf',
            );
        
    return Response::download($file, $PDF, $headers);
    }

    public function validasiCv(cvMentor $id){
          $users_id  =  $id->users_id;
          $AkunMentor = User::where('id', $users_id)->first();

        
          $AkunMentor->update([
                'status' => 'Menunggu Aktif'
            ]);
            
          $id->update([
                'info' => 'Validasi Selesai, Selamat kamu memenuhi kualifikasi, Akun Mentor kamu sudah Aktif',
                'status_validasi' => 2,
          ]);

          mentor::create([

              'users_id' => $users_id,
              'nama'     => $id->nama,
              'alamat'   => $id->alamat,
          ]);

        return redirect()->back();
    }


    public function validasiTolak(cvMentor $id){

        $users_id = $id->users_id;
        $User = User::where('id', $users_id)->first();
       
        $User->update([
            'status' => 'Validasi Gagal'
        ]);

       $id->update([
            'info' => 'Maaf, Data kamu di Tolak',
            'status_validasi' => 3,
       ]);
      
       return redirect()->back();

        
    }

    public function mentorAktif(){
        
        if(Auth::user()->role == 'Admin'){

            $data = User::where('status','Aktif')->with('mentor')->with('cvmentor')->get();
        
            return view('Admin.tableMentorAktif', compact('data'));
        }
    }

    public function nonAktif(User $id){
        
                $id->update([
                    'status' => 'Nonaktif'
                ]);

                return redirect()->back();
            }

    public function mentorNonaktif(){

        if(Auth::user()->role == 'Admin'){

            $data    = User::Where('status','Nonaktif')->Where('role','Mentor')->with('cvmentor')->get();
            
             return view('Admin.tableMentorNonaktif', compact('data'));
             

        }
    }

    public function Aktif(User $id){

            $status = $id->role;
                
            if($status == 'Mentor'){
                $id->update([
                    'status' => 'Aktif'
                ]);
                return redirect()->back();
            }else{
                $id->update([
                    'status' => 'Basic'
                ]);
                return redirect()->back();
            } 
            
              

                
    }


    public function hapusAkunMentor(User $id){

            if(Auth::user()->role == 'Admin'){

         
                $id->delete();
        
                return redirect()->back();

        
            }

    }

    public function profileMentor(User $id){

        if(Auth::user()->role == 'Admin'){

            $profile   = User::where('id', $id->id)->with('mentor')->get();

            $mentor     = mentor::where('users_id', $id->id)->with('kelas')->first();
            $mentor_id  = $mentor->id;

            $kelas      = kelas::where('mentor_id', $mentor_id )->orderBy('id', 'DESC')->paginate(2);
            $k      = kelas::where('mentor_id', $mentor_id )->orderBy('id', 'DESC')->get();
           
            return view('Admin.showProfileMentor', compact('profile', 'mentor', 'kelas', 'k'));
        }
    }




    // ----------session User-----------//--------------------------------------------------------------------/

    public function userPay(){

            if(Auth::user()->role == 'Admin'){
                return view('Admin.payUser');
            }
    }

    public function user(){

        if(Auth::user()->role == 'Admin'){

            $data = User::where('status', 'Basic')->orWhere('status', 'Premium')->get();
            return view('Admin.tableUser',compact('data'));
        }
        
    }

    public function userNonaktif(User $id){

        $id->update([
            'status' => 'Nonaktif'
        ]);

        return redirect()->back();

    }


    public function nonaktifUser(){

        if(Auth::user()->role == 'Admin'){

            $data    = User::Where('status','Nonaktif')->Where('role','User')->get();
    
             return view('Admin.tableUserNonaktif', compact('data'));
             
        }
    }


    public function hapusAkunUser(User $id){

        $id->delete();

        return redirect()->back();
    }

    
}
