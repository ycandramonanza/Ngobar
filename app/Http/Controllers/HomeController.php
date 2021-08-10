<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitWeb;
use App\Models\User;
use App\Models\mentor;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin'){

            
            $visits = visitWeb::all();
            $user   = User::where('role', 'User')->count();
            $mentor = mentor::count();
            $visit   = $visits->sum('jumlah_pengunjung');
            return view('Admin.index', compact('visit','user','mentor'));
        }else{
            return redirect()->back();
        }
    }
}
