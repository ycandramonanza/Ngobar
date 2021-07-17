@extends('MasterMentor')
@section('tittle')
<title>Edit-Materi-Kelas</title>
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
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4 class="card-title">Edit Materi</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('Update-Materi', $id->id)}}" method="POST">
                    @csrf
                    <div class="input-header">
                        <label for="nama">Sesi</label>
                    </div>
                    <div class="input-body">
                        <input type="text" value="{{$id->sesi}}"  name="sesi" id="sesi" class="form-control @error('sesi') is-invalid @enderror">
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
                        <input type="text" value="{{$id->judul_materi}}"  name="judul_materi" id="judul_materi" class="form-control @error('judul_materi') is-invalid @enderror">
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
                        <input type="text" value="{{$id->link_embed}}" name="link_embed" id="link_embed" class="form-control @error('link_embed') is-invalid @enderror" >
                        @error('link_embed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-block btn-lg btn-outline-primary"><i class="fas fa-plus"></i> Edit Materi</button>
                </form>
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
