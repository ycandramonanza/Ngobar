
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Mentor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{route('Landing-Page')}}" class="logo" style="text-transform:Capitalize"><i class="fas fa-laptop-code"></i> Ngobar</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                                <form id="logout-form" action="{{ route('Thanks-Page-Logout') }}" method="POST">
                                    @csrf
                                        <button class="btn" style="font-size: 14px"><i class="fas fa-sign-out-alt"></i> Sign Out</button>
                                </form>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>
                                <i class="fas fa-user"></i> {{Auth::user()->name}} 
                                <p id="aktif" style="visibility:hidden;">{{Auth::user()->status}}</p>
                                <div style="margin-top:-15px" id="ceks"></div> 
                                <span id="stats" style="visibility: hidden">{{$status_validasi}}</span>
                            </h3>
                            <p class="text-subtitle text-muted">Harap Memasukan Data-Data dengan Benar, Data ini akan di Validasi oleh Admin kami.</p>
                        </div>
                        <form action="{{route('Profile-Mentor-Aktif')}}" method="POST">
                            @method('PATCH')
                            @csrf
                        <div class="col-12 col-md-12 order-md-1 order-last" id="info">
                            <span id="isi" style="visibility: hidden" >{{$info}}</span>
                        </div>
                        </form>
                        <form action="{{route('Profile-Mentor-Delete', $id)}}" method="POST">
                            @method('delete')
                            @csrf
                        <div class="col-12 col-md-12 order-md-1 order-last" id="info1">
                            <span id="isi" style="visibility: hidden" >{{$info}}</span>
                        </div>
                        </form>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Formulir Pendaftaran Mentor</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form action="{{route('Formulir-Store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-header">
                                                <label for="nama">Nama Lengkap</label>
                                            </div>
                                            <div class="input-body">
                                                <input type="text" name="nama" id="nama" class="form-control  @error('nama') is-invalid @enderror ">
                                                @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                            </div>
                                            <br>
                                            <div class="input-header">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                            <div class="input-body">
                                                <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                            </div>
                                            <br>
                                            <div class="input-header">
                                                <label for="no_hp">No Handphone / WA</label>
                                            </div>
                                            <div class="input-body">
                                                <input type="text" name="no_hp" id="no_hp" class="form-control  @error('no_hp') is-invalid @enderror">
                                                @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="input-header">
                                                <label for="link">Link Portofolio</label>
                                            </div>
                                            <div class="input-body">
                                                <input type="url" name="link" id="link" class="form-control  @error('link') is-invalid @enderror">
                                                @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="input-header">
                                                <label for="document">Upload CV</label>
                                            </div>
                                            <div class="input-body">
                                                <input type="file" name="document" id="document" class="form-control  @error('document') is-invalid @enderror">
                                                @error('document')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                            </div>
                                            <br>
                                            <button  type="submit" class="btn btn-block btn-lg btn-outline-primary" id="kirimcv">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('fontawesome-free-5.15.3-web/js/all.min.js')}}"></script>

    <script>
// ---------------Info Validasi 
        let stats =  document.getElementById('stats').innerHTML;
        let info = document.getElementById('info');
        let info1 = document.getElementById('info1');
        let isi = document.getElementById('isi').innerHTML;
        if(stats == 1 ){
            info.innerHTML = ' <div class="alert alert-info" id="infocv">{{$info}}</div>';
        }else if(stats == 2) {
            info.innerHTML = 
            '<div class="alert alert-success" id="infocv">{{$info}}<button type="submit" style="color:blue" class="btn btn-link">klik disini</button> Untuk lanjut ke Dashboard Mentor.</div>';
        }else if(stats == 3){
            info1.innerHTML = '<div class="alert alert-danger">{{$info}} <button type="submit" style="color:white" class="btn btn-link">klik disini</button> Untuk Mengirim Lagi</div>';
        }else{
            info.innerHTML ='';
        }

// -----------------Aktif
        let aktif = document.getElementById('aktif').innerHTML;
        let ceks = document.getElementById('ceks');
        if(aktif == 'Tamu'){
            ceks.innerHTML = '';
        }else if(aktif == 'Validasi'){
            ceks.innerHTML = "<span style='font-size:16px;' class='btn-success rounded p-2'> Proses {{ucfirst(Auth::user()->status)}}</span>";
        }else if(aktif == "Validasi Gagal"){
            ceks.innerHTML = "<span style='font-size:16px;' class='btn-danger rounded p-2'> Proses {{ucfirst(Auth::user()->status)}}</span>";
        }
// ------------------
        
    </script>
    

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
@include('sweetalert::alert')

</html>