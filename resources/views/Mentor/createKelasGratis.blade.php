@extends('MasterMentor')
@section('tittle')
<title>Create-Kelas</title>
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
        <h3>Create Kelas <span style="font-size: 15px" class="btn-outline-success p-1 rounded">Gratis</span></h3>
        <p class="text-subtitle text-muted">Harap Gunakan Data Dengan Bijak.</p>
    </div>
</div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">New Kelas</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{route('Store-Kelas-Free')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-header">
                        <label for="nama">Kode Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" readonly value="{{$kodeKelas}}" name="kode_kelas" id="kode_kelas" class="form-control">
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Status Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" readonly name="status_kelas" value="Gratis" id="status_kelas" class="form-control ">
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="nama">Nama Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control  @error('nama_kelas') is-invalid @enderror ">
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
                        <textarea class="form-control  @error('desc') is-invalid @enderror" name="desc" id="desc" cols="30" rows="10"></textarea>
                        <span style="font-size: 12px">*Wajib di isi</span>
                        @error('desc')
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
                        <select name="tools[]" id="tools" class="form-control js-example-basic-single  @error('tools') is-invalid @enderror" multiple='multiple' required>
                                <option>Html</option>
                                <option>Css</option>
                                <option>Javascript</option>
                                <option>Php</option>
                                <option>Laravel<option>
                                <option>Vue<option>
                        </select>
                    </div>
                    <br>
                    <div class="input-header">
                        <label for="document">Upload Gambar Kelas</label>
                    </div>
                    <div class="input-body">
                        <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror">
                        <span style="font-size: 12px">*Wajib di isi</span>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <br>
                    <button  type="submit" class="btn btn-block btn-lg btn-outline-primary" id="kirimcv"><i class="fas fa-plus"></i> Tambah Kelas</button>
                </form>
            </div>
        </div>
    </div>

</section>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>
      
      $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: '-- PILIH Max: 3 --'
            });
            
        });

    </script>


@endsection 
