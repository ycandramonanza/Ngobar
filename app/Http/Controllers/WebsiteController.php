<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cvMentor;
use App\Models\mentor;
use App\Models\kelas;
use App\Models\visitWeb;
use App\Models\orderkelas;
use RealRashid\SweetAlert\Facades\Alert;
class WebsiteController extends Controller
{
    
    public function LandingPage(){

        if(Auth::guest()){

            $hari = Carbon::now()->isoFormat('Y-M-D');
            $visit = visitWeb::where('tanggal', $hari)->first();
            if($visit === null){
               $tes = visitWeb::create([
                    'jumlah_pengunjung' => 1,
                    'tanggal'           => $hari

                ]);

                return view('Website.index');
            }else{
                    $data = $visit->jumlah_pengunjung;
                    

                        for($i = $data; $i <= $data; $i++ ){

                            $visit->update([
                                'jumlah_pengunjung' => $i+1,
                            ]);
                            
                         }
                         return view('Website.index');
                 }
        }elseif(Auth::user()->role == 'User'){
            return redirect()->route('Profile-User');
        }
    }

    public function ThanksPage(){
        return view('Website.indexThanks');
    }

    public function Kelas(){
        
        return view('Website.kelas');
    }

    public function KelasDetail(kelas $id){

        if(Auth::user()->role == 'User'){

            $statusKelas = $id->status_kelas;

            $orderkelas = orderkelas::where('kelas_id', $id->id)->where('users_id', Auth::user()->id)->first();


                
                if($orderkelas == Null){

                    if($statusKelas == 'Premium'){
                        $status = '';
                        $kelas = kelas::where('id', $id->id)->with('materikelas')->with('mentor')->first();
                        $materi = $kelas->materikelas()->get();
                        $materiawal = $materi[0]->judul_materi;
                        $linkembed = $materi[0]->link_embed;
                        return view('Website.kelasDetail', compact('kelas', 'materi', 'materiawal', 'linkembed', 'status'));
                    }else{
                        orderkelas::create([
                            'kelas_id' => $id->id,
                            'users_id' => Auth::user()->id,
                            'status'   => 'Kelas Aktif'
                        ]);
    
                        $ok    = orderkelas::where('kelas_id', $id->id)->where('users_id', Auth::user()->id)->first();
                        $status = $ok->status;
                        $kelas = kelas::where('id', $id->id)->with('materikelas')->first();
                        $materi = $kelas->materikelas()->get();
                        $materiawal = $materi[0]->judul_materi;
                        $linkembed = $materi[0]->link_embed;
                        return view('Website.kelasDetail', compact('kelas', 'materi', 'materiawal', 'linkembed', 'status'));
                    }

                }else{
                    $ok    = orderkelas::where('kelas_id', $id->id)->where('users_id', Auth::user()->id)->first();
                    $status = $ok->status;
                    $kelas = kelas::where('id', $id->id)->with('materikelas')->first();
                    $materi = $kelas->materikelas()->get();
                    $materiawal = $materi[0]->judul_materi;
                    $linkembed = $materi[0]->link_embed;
                    return view('Website.kelasDetail', compact('kelas', 'materi', 'materiawal', 'linkembed', 'status'));
                }
          
        }
      
    }
    
    public function AlurBelajar(){
        return view('Website.alurBelajar');
    }

    public function ForumDiskusi(){
        return view('Website.forumDiskusi');
    }

    public function ForumDiskusiTanya(){
        return view('Website.forumDiskusiTanya');
    }

    public function ForumDiskusiBalas(){
        return view('Website.forumDiskusiBalas');
    }

    public function Mentor(){

        $data = mentor::paginate(9);
        return view('Website.mentor', compact('data'));
    }

    public function mentorProfile(mentor $id){
       
        return view('Website.mentorProfile', compact('id'));
    }
}
