<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function LandingPage(){
        return view('Website.index');
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
        return view('Website.mentor');
    }

    public function mentorProfile(){
        return view('Website.mentorProfile');
    }
}
