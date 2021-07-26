<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\Models\User;
use App\Models\kelas;
use App\Models\mentor;
use App\Models\cvMentor;
use App\Models\materikelas;
use App\Models\updateMateriKelas;
class MentorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   

    public function ProfileMentor(){

        if(Auth::user()->role == 'Mentor'){

                if(Auth::user()->status == 'Aktif'){

                    $nameMentor = Auth::user()->name;
                    return view('Mentor.index', compact('nameMentor'));

                }else{
                    return redirect()->back();
                }

        }elseif(Auth::user()->role == 'User'){
                return redirect()->back();
        }
        
    }

    public function Formulir(){

        if(Auth::user()->role == 'Mentor'){
              
                if(Auth::user()->status == 'Validasi' || Auth::user()->status == 'Validasi Gagal' ||  Auth::user()->status == 'Tamu' ||  Auth::user()->status == 'Menunggu Aktif' ){
                         // Menangkap session dan di masukan ke database
                        if (session()->has('data')) { // check if it exists
                            $value = session('data'); // to retrieve value

                            $users_id = Auth::user()->id;
                            $newData = cvMentor::where('users_id', $users_id);
                            $newData->update([
                                'info' => $value,
                            ]);
                        }
                        
                        $users_id = Auth::user()->id;
                        $getInfo = cvMentor::where('users_id', $users_id)->first();
                        if($getInfo == Null){
                            $id   = 97;
                            $info = Null;
                            $status_validasi = Null;
                            return view('Mentor.Formulir', compact('info', 'status_validasi', 'id'));
                        }else{
                            $id              = $getInfo->id;
                            $info            = $getInfo->info;
                            $status_validasi = $getInfo->status_validasi;
                            return view('Mentor.Formulir', compact('info', 'status_validasi', 'id'));
                        }
          
                    }else{

                        return redirect()->back();
                    }
                
           
            
        }elseif(Auth::user()->role == 'User'){
            return redirect()->back();
        }
        
    }

    public function FormulirStore(Request $request){


        if(Auth::user()->role == 'Mentor'){

            $users_id  = Auth::user()->id;
            
            // HAS ONE
            $data = cvMentor::where('users_id', $users_id)->first();
            
            if($data !== Null){
                Alert::warning('Oopss!', 'Kamu Sudah Mengirm Data, Kamu Tidak Bisa mengirim Kembali, Tunggu sampai Validasi selesai');
                return redirect()->route('Formulir');
            }
           
                $validated = $request->validate([

                    'nama'     => 'required',
                    'alamat'   => 'required',
                    'no_hp'    => 'required',
                    'link'     =>  '',
                    'document' => 'required|file'
         

                ],
                [
                    'nama.required'      => 'Nama Tidak Boleh Kosong',
                    'alamat.required'    =>  'Alamat Tidak Boleh Kosong',
                    'no_hp.required'     =>  'No Handphone / WA Tidak Boleh Kosong',
                    'document.required'      =>  'CV Tidak Boleh Kosong',
                  
                ]
            );

            if ($request->hasFile('document')) {

                

                     // menyimpan data file yang diupload ke variabel $file
	            	$file = $request->file('document');

                  

                    // Mendapatkan Ekstensi
                    // cara 1 -> $file nya harus memanggil fungsi getClientOriginalName()
                    // $filename = pathinfo($file, PATHINFO_FILENAME);
                    // cara 2   = $file nya TIDAK boleh memanggil fungsi getClientOriginalName()
                    $ekstensi = $file->getClientOriginalExtension();

                    // Mengkompres ekstensi menjasi huruf kecil
                    $getEkstensi = strtolower($ekstensi);
                 

                    if($getEkstensi !== 'pdf'){

                        Alert::warning('File harus PDF', 'File yang kamu masukan harus berekstensi.pdf');
                        return redirect()->route('Formulir');
                    }

                    $nama  = $request->nama;
                    $arr = explode(' ', $nama);
                    $getFirstName = $arr[0];


                    $file      = $getFirstName.time().'.'.$getEkstensi;
                    $path      = $request->file('document')->storeAs('public/CV', $file);
                    
                    cvMentor::create([
                            'users_id'       => $users_id,
                            'nama'           => $validated['nama'],
                            'alamat'         => $validated['alamat'],
                            'no_hp'          => $validated['no_hp'],
                            'link'           => $request->link,
                            'dokument'       => $file,
                            'status_validasi'=> 1,
                        ]);

                    $User = Auth::user();

                    $User->update([
                        'status' => 'Validasi'
                    ]);

                        $cvMentorNew = cvMentor::where('users_id', $users_id)->first();
                        $getNameCv   = $cvMentorNew->nama;

                    toast('CV Kamu Berhasil di Kirim!','success');
                    return redirect()->route('Formulir')->with('data', ' Data kamu sedang di validasi oleh admin kami, Kami akan mengirimkan feedback dalam 1 x 24 Jam  ');
                    
                    


            }else{
                return redirect()->route('Formulir');
            }

          
        }
    }


    public function ProfileMentorAktif(){
            
        $mentorAktif    = Auth::user();

        $mentorAktif->update([
            'status' => 'Aktif'
        ]);
             Alert::success('Selamat Datang', 'Berhasil Login');
            return redirect()->route('Profile-Mentor');
    }


    public function reloadDataCv(cvMentor $id){
        // dd($id['users_id']);
        $users_id = $id['users_id'];
        $user = User::where('id', $users_id)->first();
        $user->update([
            'status' => 'Tamu'
        ]);
        $id->delete();
        Alert::success('Reload Sukses!', 'Sekarang Kamu Bisa Mengirm Data Lagi');
        return redirect()->back();
    }



    // === kelas

    public function tableKelas(){

        if(Auth::user()->role == 'Mentor'){
            $id = Auth::user()->id;
            $mentor = mentor::where('users_id', $id)->first();
            $mentor_id =  $mentor->id;
            $data = kelas::where('mentor_id', $mentor_id)->orderBy('id', 'DESC')->with('mentor')->get();
            return view('Mentor.tableKelas', compact('data'));
        }
       
    }

    public function createKelasPremium(){

        if(Auth::user()->role == 'Mentor'){

            $pin = mt_rand(1, 99999);
            $kodeKelas = 'Ngobar-('. $pin .')';
            return view('Mentor.createKelasPremium', compact('kodeKelas'));

        }
            

    }


    public function storeKelasPremium(Request $request){

        if(Auth::user()->role == "Mentor"){

            $validated = $request->validate([
                'nama_kelas' => 'required',
                'desc'       =>  'required',
                'harga' => 'required|numeric',
                'image'       => 'required|file'
            ],
            [
                'nama_kelas.required' => 'Nama kelas wajib di isi',
                'desc.required'       =>  'Deskripsi wajib di isi',
                'harga.required' => 'Harga kelas wajib di isi',
                'harga.numeric'  => 'Harga Kelas wajib Angka',
                'image.required'       =>  'Gambar wajib di isi'
            ]
        
          );

         
        //   Validasi tools max 3
        $validasi = count($request->tools);

        if($validasi > 3){
            Alert::warning('Oopss!', 'Kolom Tools Program Maximal 3');
            return redirect()->back();
        }
      

        //   array tools convert  to string
          $tools = join(' ',$request->tools);
        // end

          $AuthId    = Auth::user()->id;
          $mentor    = mentor::where('users_id', $AuthId)->first();
          $mentor_id = $mentor->id;


        //   Image

          if($request->hasFile('image')){
        
                   $ekstensi      = $request->image->getClientOriginalExtension();
                   $strtolower    = strtolower($ekstensi);
             
                    if($strtolower !== 'png'  && $strtolower !== 'jpeg'  &&  $strtolower !== 'jpg' ){
                        Alert::warning('File Bukan Gambar', 'png, jpg, jpeg');
                        return redirect()->back();
                    }


            
                   $file        = $mentor->nama;
                   $getFirstName = explode(' ', $file);
                   $getName      =  $getFirstName[0];

                   $file         =  $getName.time().'.'.$strtolower;
                   $path         = $request->file('image')->storeAs('public/gambar_kelas/'.$mentor->id.'/', $file);

                   kelas::create([
                    'mentor_id'    => $mentor_id,
                    'kode_kelas'   => $request->kode_kelas,
                    'status_kelas' => $request->status_kelas,
                    'nama_kelas'   => $request->nama_kelas,
                    'desc'         => $request->desc,
                    'harga'        => $request->harga,
                    'harga_diskon' => $request->harga_diskon,
                    'tools'        => $tools,
                    'image'        => $file,
                    'progres'      => 'Dalam Pembuatan'
    
                ]);
                Alert::success('Berhasil Di Tambahkan', 'Kelas Baru Tersedia');
                return redirect()->route('Table-Kelas')->with('pesan', 'Kelas Baru Tersedia');

            }else{
                return redirect()->back();
            }

        }else{

            return redirect()->back();
        }
    }



    public function createKelasFree(){

        if(Auth::user()->role == 'Mentor'){

            $pin = mt_rand(1, 99999);
            $kodeKelas = 'Ngobar-('. $pin .')';
            return view('Mentor.createKelasGratis', compact('kodeKelas'));

        }
    }


    public function storeKelasFree(Request $request){


        
        if(Auth::user()->role == "Mentor"){

            $validated = $request->validate([
                'nama_kelas' => 'required',
                'desc'       =>  'required',
                'image'       => 'required|file'
            ],
            [
                'nama_kelas.required' => 'Nama kelas wajib di isi',
                'desc.required'       =>  'Deskripsi wajib di isi',
                'image.required'       =>  'Gambar wajib di isi'
            ]
        
          );

           //   Validasi tools max 3
        $validasi = count($request->tools);

        if($validasi > 3){
            Alert::warning('Oopss!', 'Kolom Tools Program Maximal 3');
            return redirect()->back();
        }
          

          $AuthId    = Auth::user()->id;
          $mentor    = mentor::where('users_id', $AuthId)->first();
          $mentor_id = $mentor->id;


            //   array tools convert  to string
            $tools = join(' ',$request->tools);
            // end
    
          if($request->hasFile('image')){

        
                   $ekstensi      = $request->image->getClientOriginalExtension();
                   $strtolower    = strtolower($ekstensi);
             
                    if($strtolower !== 'png'  && $strtolower !== 'jpeg'  &&  $strtolower !== 'jpg' ){
                        Alert::warning('File Bukan Gambar', 'png, jpg, jpeg');
                        return redirect()->back();
                    }


            
                   $file        = $mentor->nama;
                   $getFirstName = explode(' ', $file);
                   $getName      =  $getFirstName[0];

                   $file         =  $getName.time().'.'.$strtolower;
                   $path         = $request->file('image')->storeAs('public/gambar_kelas/'.$mentor->id.'/', $file);

                   kelas::create([
                    'mentor_id'    => $mentor_id,
                    'kode_kelas'   => $request->kode_kelas,
                    'status_kelas' => $request->status_kelas,
                    'nama_kelas'   => $request->nama_kelas,
                    'desc'         => $request->desc,
                    'harga'        => null,
                    'tools'        => $tools,
                    'image'        => $file,
                    'progres'      => 'Dalam Pembuatan'
    
                ]);
                Alert::success('Berhasil Di Tambahkan', 'Kelas Baru Tersedia');
                return redirect()->route('Table-Kelas')->with('pesan', 'Kelas Baru Tersedia');

            }else{
                return redirect()->back();
            }

        }else{

            return redirect()->back();
        }



    }




    public function editKelas(kelas $id){

        if(Auth::user()->role == 'Mentor'){
            // Convert field program
            $programs = kelas::where('id', $id->id)->first();
            $program  = $programs->tools;


            // tools max:3
            $array  = explode(' ', $program);
            $arrayLength = count($array);   

            if($arrayLength == 1){
                $p = $array[0];
                $p1 = null;
                $p2 = null;
                return view('Mentor.editKelas', compact('id', 'p', 'p1', 'p2'));

            }elseif($arrayLength == 2){
                $p  =  $array[0];
                $p1 =  $array[1];
                $p2  = null;
                return view('Mentor.editKelas', compact('id', 'p', 'p1', 'p2' ));
            }else{
                $p  =  $array[0];
                $p1 =  $array[1];
                $p2  = $array[2];
                return view('Mentor.editKelas', compact('id', 'p', 'p1', 'p2'));
            }

            

    
         

         
            
        }
    }


    public function updateKelas(Request $request, kelas $id){

        if(Auth::user()->role == 'Mentor'){

            
                //   Validasi tools max 3
                $validasi = count($request->tools);

                if($validasi > 3){
                    Alert::warning('Oopss!', 'Kolom Tools Program Maximal 3');
                    return redirect()->back();
                }


                  //   array tools convert  to string
                  $tools = join(' ',$request->tools);
                  // end

            if($request->hasFile('image')){
                if (File::exists(public_path('storage/gambar_kelas/'.$id->mentor_id.'/'.$id->image))) {
                    File::delete(public_path('storage/gambar_kelas/'.$id->mentor_id.'/'.$id->image));
                }

                $ekstensi      = $request->image->getClientOriginalExtension();
                $strtolower    = strtolower($ekstensi);

                $file        = $id->mentor->nama;
                $getFirstName = explode(' ', $file);
                $getName      =  $getFirstName[0];
                $file         =  $getName.time().'.'.$strtolower;
                $path         = $request->file('image')->storeAs('public/gambar_kelas/'.$id->mentor_id.'/', $file);

                $id->update([
                    'nama_kelas'     => $request->nama_kelas,
                    'desc'           => $request->desc,
                    'harga'          =>  $request->harga,
                    'harga_diskon'   =>  $request->harga_diskon,
                    'tools'          =>  $tools,
                    'image'          =>  $file,
                    'progres'        => 'Dalam Pembuatan'
                ]);
    
                Alert::success('Kelas berhasil Di Ubah', 'Sukses');
                return redirect()->route('Table-Kelas')->with('pesan', 'Kelas Berhasil di ubah');


            }else{
    
                $id->update([
                    'nama_kelas'     => $request->nama_kelas,
                    'desc'           => $request->desc,
                    'harga'          =>  $request->harga,
                    'harga_diskon'   =>  $request->harga_diskon,
                    'tools'          =>  $tools,
                    'image'          =>  $id->image,
                    'progres'        => 'Dalam Pembuatan'
                ]);
    
                Alert::success('Kelas berhasil Di Ubah', 'Sukses');
                return redirect()->route('Table-Kelas')->with('pesan', 'Kelas Berhasil di ubah');

            }
           
      
        }

    }

    public function createMateriKelas(kelas $id){

        if(Auth::user()->role == 'Mentor'){

            $kelas = kelas::where('id', $id->id)->first();
            $materiKelas = $kelas->materikelas()->get();
            $updatemateriKelas = $kelas->updatematerikelas()->get();
            $count    = count($materiKelas);
            if($count == 0){
                $judul = null;
                $link  = null;
                return view('Mentor.createMateriKelas', compact('id','materiKelas', 'judul', 'link','updatemateriKelas'));
            }else{
               
                $judul = $materiKelas[0]->judul_materi;
                $link  = $materiKelas[0]->link_embed;
                return view('Mentor.createMateriKelas', compact('id','materiKelas', 'judul', 'link', 'updatemateriKelas'));
            }
        }
   
    }

    public function deleteKelas(kelas $id){

        
        $id->delete($id);

        return redirect()->back();
    }

    public function cari(Request $request, materikelas $id){

        if(Auth::user()->role == 'Mentor'){
  
        $id = kelas::where('id', $id->kelas_id)->first();
        $kelasId = $id->id;
        $kelas = kelas::where('id', $kelasId)->first();
        $materiKelas = $kelas->materikelas()->get();
        $updatemateriKelas = $kelas->updatematerikelas()->get();
         // menangkap data pencarian
		$cari = $request->link_embed;


            if($request->status == 'updatematerikelas'){
                        // mengambil data dari table pegawai sesuai pencarian data
            $Materi = materikelas::where('link_embed','like',"%".$cari."%")->first();
            $judul   = $Materi->judul_materi;
            $link   = $Materi->link_embed;
            // mengirim data 
            return view('Mentor.updateMateriKelas', compact('id','materiKelas', 'judul', 'link', 'updatemateriKelas'));

            }else{
                
               
                // mengambil data dari table pegawai sesuai pencarian data
                $Materi = materikelas::where('link_embed','like',"%".$cari."%")->first();
                $judul   = $Materi->judul_materi;
                $link   = $Materi->link_embed;
                // mengirim data 

                
                return view('Mentor.createMateriKelas', compact('id','materiKelas', 'judul', 'link', 'updatemateriKelas'));

            }
    
        }else{
        $id = kelas::where('id', $id->kelas_id)->first();
        $kelasId = $id->id;
        $kelas = kelas::where('id', $kelasId)->first();
        $materikelas = $kelas->materikelas()->get();
        $updateMaterikelas = $kelas->updatematerikelas()->get();
        
              // menangkap data pencarian
		$cari = $request->link_embed;
     
        // mengambil data dari table pegawai sesuai pencarian data
        $Materi = materikelas::where('link_embed','like',"%".$cari."%")->first();
        $UpdateMateri = updatematerikelas::where('link_embed','like',"%".$cari."%")->first();
      
        // mengirim data 
                if($request->status == 'updatekelas'){
                    $judul   = $UpdateMateri->judul_materi;
                    $link   = $UpdateMateri->link_embed;
                    return view('Admin.cekUpdateKelas', compact('id','updateMaterikelas', 'judul', 'link'));
                }else {
                    $judul   = $Materi->judul_materi;
                    $link   = $Materi->link_embed;
                    return view('Admin.cekKelas', compact('id','materikelas', 'judul', 'link'));
                }

        }
         
    }

    public function storeMateri(Request $request, kelas $id){
        
            $validated = $request->validate([
                'judul_materi' => 'required|max:30',
                'link_embed'   =>  'required|unique:materikelas'
            ],
            [
                'judul_materi.required' => 'Judul Materi Wajib di Isi',
                'judul_materi.max'      =>  'Judul Materi Maximal 30 Karakter',
                'link_embed.required'   =>  'Link Embed Youtube Wajib di Isi',
                'link_embed.unique'   =>  'Link Embed Youtube Sudah Tersedia'
            ]
        
        );


        materikelas::create([
            'kelas_id'       => $id->id,
            'sesi'           => $request->sesi,
            'judul_materi'   => $validated['judul_materi'],
            'link_embed'     => $validated['link_embed'],
            'progres_materi' => 0
        ]);

        alert()->success('Berhasil','Materi Berhasil di Tambahkan.');
        return redirect()->back();
    }

    public function editMateri(materikelas $id){
        if(Auth::user()->role == 'Mentor'){

                return view('Mentor.editMateri', compact('id'));
        }
    }


    public function updateMateri(Request $request , materikelas $id){
           
                $validated = $request->validate([
                    'judul_materi' => 'required|max:30',
                    'link_embed'   =>  'required',
                ],
                [
                    'judul_materi.required' => 'Judul Materi Wajib di Isi',
                    'judul_materi.max'      =>  'Judul Materi Maximal 30 Karakter',
                    'link_embed.required'   =>  'Link Embed Youtube Wajib di Isi'
                ]
            
            );


            $id->update([
                'sesi'         => $request->sesi,
                'judul_materi' => $validated['judul_materi'],
                'link_embed'   =>  $validated['link_embed']
            ]);

            $id = kelas::where('id', $id->kelas_id)->first();
            $id = $id->id;

            alert()->success('Berhasil di Ubah','Materi Berhasil di Ubah.');
            return redirect()->route('Create-Materi-Kelas', $id);
    }


    public function deleteMateri(materikelas $id){
          
            $id->delete();

            return redirect()->back();
    }


    public function mangajukanPublish(kelas $id){
          
            if($id->progres == 'Siap Publish'){
                Alert::warning('Oops..!', 'Kelas ini sudah di ajukan untuk publish, Admin sedang memvalidasi kelas anda untuk di publish.');
                return redirect()->back();
            }elseif($id->progres == 'Publish'){
                Alert::warning('Oops..!', 'Kelas ini sudah dalam status publish');
                return redirect()->back();
            }

            $id->update([
                'progres' => 'Siap Publish'
            ]);

            alert()->success('Berhasil di Kirim','Mengajukan Publish ke Admin.');
            return redirect()->back();
    }


    public function updateMateriKelas(kelas $id){

        if(Auth::user()->role == 'Mentor'){


            $kelas = kelas::where('id', $id->id)->first();
            $updatemateriKelas = $kelas->updatematerikelas()->get();
           
                $judul = $updatemateriKelas[0]->judul_materi;
                $link  = $updatemateriKelas[0]->link_embed;
                return view('Mentor.updateMateriKelas', compact('id', 'judul', 'link', 'updatemateriKelas'));
            
        }

    }


    public function storeUpdateMateriKelas(Request $request, kelas $id){

        $validated = $request->validate([
            'judul_materi' => 'required|max:30',
            'link_embed'   =>  'required'
        ],
        [
            'judul_materi.required' => 'Judul Materi Wajib di Isi',
            'judul_materi.max'      =>  'Judul Materi Maximal 30 Karakter',
            'link_embed.required'   =>  'Link Embed Youtube Wajib di Isi'
        ]

    
    );

    updatematerikelas::create([
            'kelas_id'       => $id->id,
            'sesi'           => $request->sesi,
            'judul_materi'   => $validated['judul_materi'],
            'link_embed'     => $validated['link_embed'],
            'progres_materi' => 0
    ]);

    alert()->success('Berhasil','Materi Berhasil di Tambahkan.');
    return redirect()->back();
            
    }


    public function updateCari(Request $request, updatematerikelas $id){

       
        if(Auth::user()->role == 'Mentor'){
            $id = kelas::where('id', $id->kelas_id)->first();
            $kelasId = $id->id;
            $kelas = kelas::where('id', $kelasId)->first();
            $materiKelas = $kelas->materikelas()->get();
            $updatemateriKelas = $kelas->updatematerikelas()->get();
            
                  // menangkap data pencarian
            $cari = $request->link_embed;
    
            // mengambil data dari table pegawai sesuai pencarian data
            $Materi = updatematerikelas::where('link_embed','like',"%".$cari."%")->first();
            $judul   = $Materi->judul_materi;
            $link   = $Materi->link_embed;
            // mengirim data 
                return view('Mentor.updateMateriKelas', compact('id','materiKelas', 'judul', 'link', 'updatemateriKelas'));
            
        }else{

            $id = kelas::where('id', $id->kelas_id)->first();
            $kelasId = $id->id;
            $kelas = kelas::where('id', $kelasId)->first();
            $materiKelas = $kelas->materikelas()->get();
            $updateMaterikelas = $kelas->updatematerikelas()->get();
            
                  // menangkap data pencarian
            $cari = $request->link_embed;
    
            // mengambil data dari table pegawai sesuai pencarian data
            $Materi = updatematerikelas::where('link_embed','like',"%".$cari."%")->first();
            $judul   = $Materi->judul_materi;
            $link   = $Materi->link_embed;
            // mengirim data 
                return view('Admin.cekUpdateKelas', compact('id','materiKelas', 'judul', 'link', 'updateMaterikelas'));
        }
     
    }
    

    public function updatemangajukanPublish(kelas $id){
        $kelas = kelas::where('id', $id->id)->first();
        $updatemateriKelas = $kelas->updatematerikelas()->get();
        $materiKelas = $kelas->materikelas()->get();
        $countUpdate = count($updatemateriKelas);
        $countMateri = count($materiKelas);

        if($countUpdate == $countMateri){
            Alert::error('Opss..!', 'Belum ada materi yang kamu update');
            return redirect()->back();
        }
      
        foreach($updatemateriKelas as $up){

            $up->update([
                'progres_materi' => 'Update Kelas'
            ]);
        }

        $id->update([
            'progres' => 'Update Kelas'
        ]);

        alert()->success('Berhasil','Sedang Mengajukan Update Kelas');
        return redirect()->route('Update-Materi-Kelas', $id->id);

        
    }


}
