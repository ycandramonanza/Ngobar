@extends('MasterMentor')
@section('tittle')
<title>Create-Materi-Kelas</title>
@section('contentMentor')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <style>
        .form-select{
            width: 100px
        }
    </style>
    
<div class="row">
</div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Materi</th>
                        <th>Link Embed Youtube</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materiKelas as $items)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$items->judul_materi}}</td>
                            <td>{{$items->link_embed}}</td> 
                            <td>
                                <form>
                                    <a href="{{route('Edit-Materi', $items->id)}}" class="btn btn-success"><i class="fas fa-pen-square"></i></a>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('Delete-Kelas', $items->id)}}" method="Post" id="hapusKelas{{$items->id}}">
                                    @csrf
                                    @method('Delete')
                                    <button type="button" class="btn btn-danger hapusKelas" data-id="{{$items->id}}"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>   
                        
                    @empty
                        
                     @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4 class="card-title">Create Materi</h4>
                </div>
                <div class="col-8">
                    <h4 style="font-size:30px">"{{$id->nama_kelas}}"</h4>
                </div>
                <hr>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('Store-Materi', $id->id)}}" method="POST">
                    @csrf
                    <div class="input-header">
                        <label for="nama">Sesi</label>
                    </div>
                    <div class="input-body">
                        <input type="text"  name="sesi" id="sesi" class="form-control @error('sesi') is-invalid @enderror">
                        <span class="text-danger">*Sesi digunakan ketika kamu ingin membatasi pembahasan,</span>
                        @error('sesi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Judul Materi</label>
                    </div>
                    <div class="input-body">
                        <input type="text"  name="judul_materi" id="judul_materi" class="form-control @error('judul_materi') is-invalid @enderror">
                        @error('judul_materi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Link Embed Video Youtube</label>
                    </div>
                    <div class="input-body">
                        <input type="text" name="link_embed" id="link_embed" class="form-control @error('link_embed') is-invalid @enderror" >
                        @error('link_embed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-block btn-lg btn-outline-primary"><i class="fas fa-plus"></i> Tambah Materi</button>
                </form>
            </div>
        </div>
    </div>
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
                                   
                                    @foreach ($materiKelas as $item)
                                        <form action="{{route('Cari-Materi', $item->id)}}" method="GET" id="cari{{$item->id}}">
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
                                <div class="col-12 mt-5">
                                        <button class="btn btn-block btn-outline-primary">Ajukan Untuk Publish</button>
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
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>
      
         let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
 
        $(".submit").click(function(e){
            id = $(this).data('id');
             $(`#cari${id}`).submit();    
        })   

        $(".submit").hover(function(){
            $(this).toggleClass('alert-light');
        });

        $('#views').ready(function() {

        });

        let data       = document.getElementById('juduls').innerHTML;
        let datas       = document.getElementById('views');
        let dataLength =  data.length;

              if(dataLength < 1){
                    datas.style.visibility = 'hidden';
              }else{
                     datas.style.visibility = 'visible';
              }

    </script>


@endsection 
