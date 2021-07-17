@extends('MasterMentor')
@section('tittle')
<title>Edit-Kelas</title>
@section('contentMentor')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
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
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Kelas <span style="font-size: 15px" class="btn-outline-primary p-1 rounded " id="statusKelas">Premium <i class="fas fa-star text-warning"></i></span></h3>
        <p class="text-subtitle text-muted">Harap Gunakan Data Dengan Bijak.</p>
    </div>
</div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kelas</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('Update-Kelas', $id->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="input-header">
                        <label for="nama">Kode Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" readonly value="{{$id->kode_kelas}}" name="kode_kelas" id="kode_kelas" class="form-control">
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Status Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" readonly name="status_kelas" value="{{$id->status_kelas}}" id="status_kelas" class="form-control ">
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Nama Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control  @error('nama_kelas') is-invalid @enderror " value="{{$id->nama_kelas}}" >
                        <span style="font-size: 12px">*Wajib di isi</span>
                        @error('nama_kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="alamat">Deskripsi</label>
                    </div>
                    <div class="input-body">
                        <textarea class="form-control  @error('desc') is-invalid @enderror" name="desc" id="desc" cols="30" rows="10">{{$id->desc}}</textarea>
                        <span style="font-size: 12px">*Wajib di isi</span>
                        @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <br>
                    <div class="input-header harga">
                        <label for="nama">Harga Kelas</label>
                    </div>
                    <div class="input-body harga">
                        <input type="text" name="harga" id="harga" class="form-control  @error('harga') is-invalid @enderror " value="{{$id->harga}}">
                        <span style="font-size: 12px">*Wajib di isi</span>
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <div class="input-header harga">
                        <label for="nama">Harga Diskon</label>
                    </div>
                    <div class="input-body harga">
                        <input type="text" name="harga_diskon" id="harga_diskon" class="form-control  @error('harga_diskon') is-invalid @enderror " value="{{$id->harga_diskon}}">
                        <span style="font-size: 12px">*isi jika ada diskon</span>
                        @error('harga_diskon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Tools Program Yang Akan di Gunakan di Kelas</label>
                    </div>
                    <div class="input-body">
                        <select  name="tools[]" id="tools" class="form-control js-example-basic-single  @error('tools') is-invalid @enderror"  multiple='multiple' required >
                            
                            <option value="Html" {{ $p  == 'Html' || $p1 == 'Html'  || $p2 == 'Html' ? 'selected' : '' }}>Html</option>
                            <option value="Css"  {{ $p == 'Css' || $p1 == 'Css' || $p2 == 'Css' ? 'selected' : '' }} >Css</option>
                            <option value="Javascript" {{ $p == 'Javascript' || $p1 == 'Javascript' || $p2 == 'Javascript' ? 'selected' : '' }}>Javascript</option>
                            <option value="Php" {{$p == 'Php' || $p1 == 'Php' || $p2 == 'Php' ? 'selected' : '' }}>Php</option>
                            <option value="Laravel" {{$p == 'Laravel' || $p1 == 'Laravel' || $p2 == 'Laravel' ? 'selected' : '' }} >Laravel<option>
                            <option value="Vue" {{ $p == 'Vue' || $p1 == 'Vue' || $p2 == 'Vue' ? 'selected' : '' }}>Vue<option>
        
                        </select>
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="document">Upload Gambar Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" value="{{asset('storage/gambar_kelas/'. $id->mentor_id.'/'.$id->image)}}">
                        <span style="font-size: 12px">*Wajib di isi</span>
                        <br>
                        <img src="{{asset('storage/gambar_kelas/'. $id->mentor_id.'/'.$id->image)}}" alt="" width="100px">
                        <span style="font-size: 12px">*Gambar sebelumnya</span>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-block btn-lg btn-outline-primary" id="kirimcv"><i class="fas fa-pen-square"></i> Edit Kelas</button>
                </form>
            </div>
        </div>
    </div>

</section>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>

// Manipulasi edit ketika kelas free

       let free = document.getElementById('status_kelas').value;
       let status = document.getElementById('statusKelas');
      
        if(free == 'Gratis'){
               let free = $('.harga').css('visibility', 'hidden');
               $('.harga').css('margin-top', -50);
               status.innerHTML = 'Gratis';
        }


        // select2

        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: '-- PILIH Max: 3 --'
            });
            
        });

    
     

          
    </script>


@endsection 
