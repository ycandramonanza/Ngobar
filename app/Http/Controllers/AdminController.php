<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\cvMentor;
use App\Models\mentor;
use App\Models\kelas;
use App\Models\materikelas;
use App\Models\updatematerikelas;
use App\Models\orderkelas;
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


    public function cekKelas(kelas $id){
            if(Auth::user()->role == 'Admin'){

                $materikelas = materikelas::where('kelas_id', $id->id)->get();
                $judul   = $materikelas[0]->judul_materi;
                $link   = $materikelas[0]->link_embed;
              
                return view('Admin.cekKelas', compact('id', 'materikelas', 'judul', 'link'));
            }
    }


    public function publishKelas(kelas $id){
            
        $progres = $id->progres;
     
        if($progres == 'Publish'){
            Alert::warning('Oopss!', 'Kelas Sudah dalam status Publish');
            return redirect()->back();
        }else if($progres == 'DiTolak'){
            Alert::warning('Oopss!', 'Kelas Sudah dalam status DiTolak');
            return redirect()->back();
        }else if($progres == 'Update Kelas'){
            $updateKelas = updatematerikelas::where('kelas_id', $id->id)->get();
            $materiKelas = materikelas::where('kelas_id', $id->id)->get();
            materikelas::destroy($materiKelas);
                foreach($updateKelas as $upk){
                    materikelas::create([
                        'kelas_id'       => $id->id,
                        'sesi'           => $upk->sesi,
                        'judul_materi'   => $upk->judul_materi,
                        'link_embed'     => $upk->link_embed,
                        'progres_materi' => 0
                    ]);
                }

                $id->update([
                    'progres' => 'Publish'
                ]);

            alert()->success('Kelas Berhasil di Update dan sudah Publish','Sekarang kelas sudah dapat di lihat di webiste Ngobar.com.');
            return redirect()->back();

        }else if($progres == 'Update DiTolak'){
            alert()->warning('Opss','Kelas Sudah dalam Status Publish!');
            return redirect()->back();
        }

            $id->update([
                'progres' => 'Publish'
            ]);
            alert()->success('Kelas Berhasil di Publish','Sekarang kelas sudah dapat di lihat di webiste Ngobar.com.');
            return redirect()->back();
    }

    public function tolakKelas(kelas $id){

            if($id->progres == 'DiTolak'){
                alert()->warning('Opss','Kelas sudah dalam Status DiTolak!');
                return redirect()->back();

            }else if($id->progres == 'Publish'){
                alert()->warning('Opss','Kelas Sudah dalam Status Publish!');
                return redirect()->back();
            }else if($id->progres == 'Update Kelas'){
                $id->update([
                    'progres' => 'Update DiTolak'
                ]);
                alert()->success('Update Kelas di Tolak','Berhasil mengirimkan feedback');
                return redirect()->back();

            }else if($id->progres == 'Update DiTolak'){
                alert()->warning('Opss','Kelas Sudah dalam Status Publish!');
                return redirect()->back();
            }
            
            $id->update([
                'progres' => 'DiTolak'
            ]);

            alert()->success('Kelas di Tolak','Berhasil mengirimkan feedback');
            return redirect()->back();
    }


    public function cekUpdateKelas(kelas $id){
        if(Auth::user()->role == 'Admin'){

            $updateMaterikelas = updatematerikelas::where('kelas_id', $id->id)->get();
            $judul   = $updateMaterikelas[0]->judul_materi;
            $link   = $updateMaterikelas[0]->link_embed;
          
            return view('Admin.cekUpdateKelas', compact('id', 'updateMaterikelas', 'judul', 'link'));
        }
    }




    // ----------session User-----------//--------------------------------------------------------------------/

    public function userPay(){

            if(Auth::user()->role == 'Admin'){
                $order = orderkelas::where('status', 'Order')->with(['kelas', 'users'])->get();
                
                return view('Admin.payUser', compact('order'));
            }
    }

    public function orderPay(orderkelas $id){

        $id->update([
            'status' => 'Kelas Aktif'
        ]);

        return redirect()->back();
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
