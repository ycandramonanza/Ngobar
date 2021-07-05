@extends('MasterWebsite')
@section('contentWebsite')
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/website.css')}}">

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="judul">
                            <h1 id="kelasNgoding" class="text-center mt-5">Forum<strong> Diskusi</strong> Pertanyaan</h1>
                            <p><strong>Silahkan bertanya apa yang mau di tanyakan, Sebelum Submit Pertanyaan agar tidak di  "Hapus" silahkan baca ( Aturan Pertanyaan nya).</strong></p>
                            <p>
                        </div>
                            <button class="btn btn-outline-light" id="tanya" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-tasks"></i>  Klik Disini Untuk <span id="lihat">Melihat</span> Peraturan Pertanyaan
                            </button>
                          </p>
                          <div class="collapse" id="collapseExample">
                              <div class="card-header bg-dark">
                                  <h3 class="text-white">Peraturan Pertanyaan</h3>
                                <div class="card card-body">
                                    1. Jangan bertanya selain bertanya tentang programming.
                                    <br>
                                    2. Pertanyaan harus To the Point.
                                    <br>
                                    3. Bertanyalah sesudah kamu research sendiri, kalau gabisa baru nanya, jangan malas untuk mencari tahu dulu.
                                    <br>
                                    4. Saat menjelaskan jangan memasukan kode di text, kamu bisa menampilkan kode dengan gambar.
                                    <br>
                                    5. Usahakan bertanya yang singkat jelas dan mudah di mengerti sama pembaca/ pemberi solusi.               
                                </div>
                              </div>
                          </div>
                        <a href="" class="btn btn-outline-light mb-5 mt-5"><i class="fas fa-search"></i> Cari Kelas</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section mt-5" id="services bg-white">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2>Apa Yang Mau Kamu Tanyakan <i class="fas fa-question-circle"></i></a></h2>
                </div>
                <div class="col-12 text-center d-flex justify-content-center mt-5">
                    <div class="card-body  col-md-8 col-sm-12 p-5 rounded" style="background-color: rgb(248, 248, 248)">
                        <form action="">
                            <div class="input-group">
                                <label for="judul" style="position: absolute; z-index:1; color:rgb(153, 153, 153)" class="p-2">Judul Detail</label>
                                <input type="text" id="judul"  class="form-control p-5 tanya" style="background-color: rgb(241, 241, 241); z-index:0" placeholder="Masukan Judul..">
                            </div>
                            <br>
                            <div class="input-group">
                                <label for="judul" style="position: absolute; z-index:1; color:rgb(153, 153, 153)" class="p-2">Penjelasan Detail</label>
                                <textarea name="" class="form-control tanya p-5" id="" cols="30" rows="10" style="background-color: rgb(241, 241, 241); z-index:0" placeholder="Masukan Penjelasan.."></textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <input id="fileupload" name="input2" type="file" class="form-control tanya"  data-show-upload="false" data-show-caption="true" >
                            </div>
                            <div class="input-group">
                                <button class="btn btn-primary mt-3" type="submit">Submit Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
    </section >
    <!-- ***** Features Small End ***** -->
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>

        let button = document.getElementById('tanya');
        let lihat  = document.getElementById('lihat');
        let judul = document.getElementById('judul');
        judul.style.visibility = "visible";
        function ghost(){
           
           if(judul.style.visibility == 'visible'){
                 judul.style.visibility = "hidden";
           }else{
                 judul.style.visibility = "visible";
           }

           if(lihat.innerHTML == 'Melihat'){
                lihat.innerHTML = "Menutup"
           }else{
            lihat.innerHTML = "Melihat"
           }
           
        }
        button.addEventListener('click', ghost);

    </script>



        

@endsection


