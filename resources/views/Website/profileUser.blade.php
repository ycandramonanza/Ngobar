@extends('MasterWebsite')

@section('websiteCSS')
<link rel="stylesheet" href="{{asset('css/webiste.css')}}">
@endsection

@section('contentWebsite')


        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row mt-5 text-center">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row" style="margin-top: 150px">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <h2  id="kelasNgoding" class="text-center text-white">Selamat <strong> <span id="salam">{{$salam}}</span></strong></h2>
                                    <img src="{{asset('Pavicon/user.png')}}" id="profiles" class="img-fluid"  alt="" style="margin-top: -10px">
                                    <h1 id="namaUser"><strong>{{Auth::user()->name}}</strong></h1> 
                                    <a href="#about" class="btn btn-outline-light mb-5"><i class="fas fa-search"></i> Cari Kelas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Header Text End ***** -->
        </div>
        <!-- ***** Welcome Area End ***** -->
    
    
        <!-- ***** Features Small Start ***** -->
        <section class="section mt-1" id="services bg-white">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-12 text-center">
                        <h1 class="mb-2 text-dark" id="kelasBaru">
                            <img src="{{asset('Pavicon/blackboard.png')}}" width="70" alt="">  Kelas Terbaru
                        </h1>
                    </div>
                    
                    <div class="row">
                        <div class="row d-flex justify-content-center mt-5">
                            @foreach ($kelas as $item)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                                <div class="container">
                                    <div class="card">
                                        <div class="icon mb-3 text-center">
                                            <i><img src="{{asset('storage/gambar_kelas/'.$item->mentor->id.'/'. $item->image)}}" class="img-fluid"  style="width:350px; height:200px" alt=""></i>
                                        </div>
                                        <div class="mentor text-center">
                                            <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                            <p class="service-title">{{$item->mentor->nama}}</p>
                                        </div>
                                        <div class="card-body">
                                          <h5 class="card-title">{{$item->nama_kelas}}<span style="font-size:15px"> {{$item->status_kelas}}</span></h5>
                                          <p class="card-text">{{substr($item->desc, 0, 100)}}..</p>
                                          <hr>
                                          <span>Harga : Rp.{{number_format($item->harga)}}</span>
                                          <br>
                                          <span>Harga Diskon : Rp.{{number_format($item->harga_diskon)}}</span>
                                          <hr>
                                            <div class="info mt-3" style="font-size: 13px">
                                            <span class="split" style="visibility: hidden">{{$item->tools}}</span>
                                            <span class="program d-flex justify-content-left"  ></span>
                                            </div>
                                            <div class="masukkelas">
                                                @if ($item->status_kelas == 'Premium')
                                                <a href="{{route('Kelas-Detail', $item->id)}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Order Kelas</a>
                                                @endif
                                                @if ($item->status_kelas == 'Gratis')
                                                <a href="{{route('Kelas-Detail', $item->id)}}" class="btn btn-outline-success d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            @endforeach
                          </div>
                    </div>
               </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $kelas->links() }}
            </div>
        </section >
        <!-- ***** Features Small End ***** -->
        <script>
            let cloud = document.getElementById('salam').innerHTML
            if(cloud == 'Malam'){
                document.getElementById('salam').innerHTML += ' <i id="cuaca" class="fas fa-moon"></i>'
                document.getElementById('cuaca').style.color = 'yellow'
            }else if(cloud == 'Sore'){
                document.getElementById('salam').innerHTML += ' <i id="cuaca" class="fas fa-cloud-moon"></i>'
                document.getElementById('cuaca').style.color = 'yellow'
            }else if(cloud == 'Siang'){
                document.getElementById('salam').innerHTML += ' <i id="cuaca" class="fas fa-cloud-sun"></i>'
                document.getElementById('cuaca').style.color = 'yellow'
            }else{
                document.getElementById('salam').innerHTML += '  <i id="cuaca" class="fas fa-sun"></i>'
                document.getElementById('cuaca').style.color = 'yellow'
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



