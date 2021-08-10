@extends('MasterAdmin')
@section('tittle')
<title>Cek-Update-Kelas</title>
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
        <h3>Proses Pengecekan Update Kelas</h3>
        <p class="text-subtitle text-muted">Harap Gunakan Data Dengan Bijak.</p>
    </div>
</div>
</div>
<section class="section">
<div class="card">

    <div class="row mt-5" id="views">
        <div class="card">
            <div class="col-12">
                <div class="row g-0 bg-light position-relative p-5 rounded">
                    <div class="col-12 d-flex justify-content-center mb-2">
                        <h2 class="mt-0"  id="juduls">{{$judul}}</h2>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"  src="{{$link}}" width="650" height="400" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card p-3 mt-5">
                        <div class="col-12 mt-5 d-flex justify-content-center">
                            <h3 style="border-bottom: 2px solid rgb(192, 192, 192)">Materi</h3>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-8  mt-5 ">
                                   
                                    @foreach ($updateMaterikelas as $item)
                                        <form action="{{route('Update-Cari-Materi', $item->id)}}" method="GET" id="cari{{$item->id}}">
                                            <input type="text" hidden name="status" value="updatekelas">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </symbol>
                                            </svg>
                                            <h4>{{$item->sesi}}</h4>
                                            <div class="alert alert-primary d-flex align-items-center submit" role="alert" style="box-shadow: 1px 1px 3px grey;cursor: pointer" data-id="{{$item->id}}">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                                <div>
                                                    <input type="hidden" name="link_embed" value="{{$item->link_embed}}">
                                                    {{$item->judul_materi}}
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
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

        $(".submit").click(function(e){
            id = $(this).data('id');
             $(`#cari${id}`).submit();    
        })   

         $(".submit").hover(function(){
            $(this).toggleClass('alert-light');
        });
                



    </script>


@endsection 
