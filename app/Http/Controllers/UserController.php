<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kelas;
use App\Models\materikelas;
use App\Models\orderkelas;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
   
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function ProfileUser(){
        

        if(Auth::user()->role == 'User'){


            if(Auth::user()->status == 'Basic' || Auth::user()->status == 'Premium' ){

                    $id = Auth::user()->id;
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

                    $kelas = kelas::where('progres', 'Publish')->orWhere('progres', 'Update Kelas')->orWhere('progres', 'Update DiTolak')->with('orderkelas')->orderBy('id', 'DESC')->paginate(3);

                    $orderkelas = orderkelas::where('users_id', Auth::user()->id)->pluck('status', 'id');
                    // dd($orderkelas);
    
                    return view('Website.profileUser', compact('salam', 'kelas', 'orderkelas'));

            }elseif(Auth::user()->status == 'Nonaktif'){
                    return redirect()->back();
            }
            
                    

        }


    }

    public function orderKelas(kelas $id){
        orderkelas::create([
            'kelas_id' => $id->id,
            'users_id' => Auth::user()->id,
            'status'   => 'Order'
        ]);
        $ok    = orderkelas::where('kelas_id', $id->id)->where('users_id', Auth::user()->id)->first();
        $status = $ok->status;
        $kelas = kelas::where('id', $id->id)->with('materikelas')->first();
        $materi = $kelas->materikelas()->get();
        $materiawal = $materi[0]->judul_materi;
        $linkembed = $materi[0]->link_embed;
        // Alert::success('Order Berhasil', 'Kelas Berhasil di Order');
        return view('Website.kelasDetail', compact('kelas', 'materi', 'materiawal', 'linkembed', 'status'));
    }
}
