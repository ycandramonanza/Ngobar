@extends('MasterAdmin')
@section('tittle')
<title>Profile-Mentor</title>
@section('contentAdmin')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
 <style>
        .form-select{
            width: 100px
        }
    </style>
    
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Profile Mentor</h3>
        <p class="text-subtitle text-muted">Harap Gunakan Data Dengan Bijak.</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section class="section">
<div class="card">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                        <img src="{{asset('Pavicon/user.png')}}" alt="">
                </div>
                @foreach ($profile as $item)
                <div class="col-12 text-center">
                        <h3>{{$item->mentor->nama}}</h3>
                </div>
                <div class="col-12 text-center mb-5">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <span>({{number_format($item->mentor->rating)}})</span>
                </div>
                @endforeach
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jumlah Kelas</th>
                                <th>Join Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->count()}} Kelas</td> 
                                <td>{{$item->mentor->pengikut}} Orang</td>
                            </tr>   
                            @endforeach 
                        </tbody>
                    </table>
                </div>
             </div>
        </div>
</div>
<div class="row">
        <div class="col-12 text-center">
                <h5>KELAS</h5>
                <hr>
        </div>
        @foreach ($kelas as $item)

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-3">
            <div class="container">
                <div class="card" style="width: 25rem;">
                    <div class="icon mb-3 text-center" >
                        <img src="{{asset('storage/gambar_kelas/'.$item->mentor_id.'/'.$item->image)}}" class="card-img-top" alt="" style="height: 200px">
                    </div>
                    <div class="mentor text-center">
                        <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                             <p class="service-title" >{{$mentor->nama}}</p>
                    </div>
                    <div class="div d-flex justify-content-center">
                        <span class="btn btn-info">{{$item->progres}}</span>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title" style="font-size: px">{{$item->nama_kelas}} <span style="font-size:13px" class="btn-light p-1 rounded status" >{{$item->status_kelas}}</span></h5>
                      <hr>
                      <div class="div">
                        <span>{{substr($item->desc, 0, 200)}}....</span>
                    </div>
                    <hr>
                      <div class="info mt-3" style="font-size: 13px">
                          <span class="split" style="visibility: hidden">{{$item->tools}}</span>
                          <span class="program d-flex justify-content-left"  > </span>
                      </div>
                      <a href="{{route('Kelas-Detail')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                      <a href="{{route('Kelas-Detail')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Publish</a>
                    </div>
                  </div>
            </div>
     </div>        
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $kelas->links() }}
        </div>
</div>
</section>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>
     
    //  manipulasi status_kelas
     let statusKelas = document.getElementsByClassName('status');
     
     let length      =  statusKelas.length;

     for(let i = 0; i < length; i++){
       let stats =  statusKelas[i].innerHTML;

            if(stats == 'Premium'){
                
                statusKelas[i].innerHTML = '<b class=" text-primary">Premium <i class="fas fa-star text-warning"></i></b>'

            }else{
                statusKelas[i].innerHTML = '<b class=" text-success">Gratis</b>'
            }
     }


    //  manipulasi tools

    let tools  = document.getElementsByClassName('split');
    let program= document.getElementsByClassName('program');
    let long      =  tools.length;

            for(let j = 0; j < long; j++){
                let pr      = program[j];
                let tool      = tools[j];
                let split      = tools[j].innerHTML;
                let arr       =  split.split(' ');
                let arrLength =  arr.length;
              
                    if(arrLength == 1){

                            if(split == 'Laravel'){
                                    pr.innerHTML += ' <b class="btn btn-danger" style="font-size:12px">Laravel</b> '
                            }else if(split == 'Vue'){
                                    pr.innerHTML += ' <b class="btn btn-success" style="font-size:12px" >Vue</b> '
                            }else if(split == 'Php'){
                                    pr.innerHTML += ' <b class="btn btn-primary" style="font-size:12px" >Php</b> '
                            }else if(split == 'Html'){
                                    pr.innerHTML += ' <b class="btn btn-dark" style="font-size:12px">Html</b> '
                            }else if(split == 'Css'){
                                    pr.innerHTML += ' <b class="btn btn-info" style="font-size:12px">Css</b> '
                            }else if(split == 'Javascript'){
                                    pr.innerHTML += ' <b class="btn btn-warning" style="font-size:12px">Javascript</b> '
                            }
                            

                    }else if(arrLength == 2){

                                 for(k=0; k<arrLength; k++){
                                    
                                    tools2 = arr[k];
                                
                                    if( tools2  == 'Laravel'){
                                            pr.innerHTML  += ' <b class="btn btn-danger m-1" style="font-size:12px">Laravel</b> '
                                    }else if( tools2  == 'Vue'){
                                            pr.innerHTML  += ' <b class="btn btn-success m-1" style="font-size:12px">Vue</b> '
                                    }else if( tools2  == 'Php'){
                                            pr.innerHTML  += ' <b class="btn btn-primary m-1" style="font-size:12px">Php</b> '
                                    }else if( tools2  == 'Html'){
                                            pr.innerHTML  += ' <b class="btn btn-dark m-1" style="font-size:12px">Html</b> '
                                    }else if( tools2  == 'Css'){
                                            pr.innerHTML  += ' <b class="btn btn-info m-1" style="font-size:12px">Css</b> '
                                    }else if( tools2  == 'Javascript'){
                                            pr.innerHTML  += ' <b class="btn btn-warning m-1" style="font-size:12px">Javascript</b> '
                                    }  
                                }

                    }else if(arrLength == 3){

                                for(y=0; y<arrLength; y++){
                                    
                                    tools3 = arr[y];

                                    if( tools3  == 'Laravel'){
                                            pr.innerHTML  += '<b class="btn btn-danger m-1" style="font-size:12px">Laravel</b> '
                                    }else if( tools3  == 'Vue'){
                                            pr.innerHTML  += '<b class="btn btn-success m-1" style="font-size:12px">Vue</b> '
                                    }else if( tools3  == 'Php'){
                                            pr.innerHTML  += '<b class="btn btn-primary m-1" style="font-size:12px">Php</b> '
                                    }else if( tools3  == 'Html'){
                                            pr.innerHTML  += '<b class="btn btn-dark m-1" style="font-size:12px">Html</b> '
                                    }else if( tools3  == 'Css'){
                                            pr.innerHTML  += ' <b class="btn btn-info m-1" style="font-size:12px">Css</b> '
                                    }else if( tools3  == 'Javascript'){
                                            pr.innerHTML  += ' <b class="btn btn-warning m-1" style="font-size:12px">Javascript</b> '
                                    }  
                                }
                    }
                        
                }
                



    </script>


@endsection 
