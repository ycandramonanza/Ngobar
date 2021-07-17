<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cvMentor;
use App\Models\mentor;
use App\Models\visitWeb;
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
        }elseif(Auth::user()){
            return redirect()->back();
        }
    }

    public function ThanksPage(){
        return view('Website.indexThanks');
    }

    public function Kelas(){
        return view('Website.kelas');
    }

    public function KelasDetail(){
        return view('Website.kelasDetail');
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
