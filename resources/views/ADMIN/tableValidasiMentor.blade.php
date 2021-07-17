@extends('MasterAdmin')
@section('tittle')
<title>Table-Validasi-Mentor</title>
@section('contentAdmin')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
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
        <h3>Table Validasi Mentor</h3>
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
    <div class="card-header">
        Simple Datatable
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp / Wa</th>
                    <th>link</th>
                    <th>Dokumen CV</th>
                    <th>Validasi</th>
                    <th>Tolak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->no_hp}}</td>
                    <td><a href="{{$item->link}}">{{$item->link}}</a></td>
                    <td>
                        <a href="{{route('Download-Cv', $item->id)}}" class="btn btn-link text-left" style="font-size:12px">
                            {{$item->dokument}}
                        </a>
                    </td>
                    <td>
                        <form action="{{route('Validasi-Cv', $item->id)}}" method="POST" id="validasi_send{{$item->id}}">
                            @csrf
                            @method('PATCH')
                                 <button type="button" class="btn btn-success swal-validasi" data-id="{{$item->id}}" data-nama="{{$item->nama}}"><i class="fas fa-check-square"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('Validasi-Tolak', $item->id)}}" method="POST" id="validasi_tolak{{$item->id}}">
                            @csrf
                            @method('PATCH')
                                 <button type="button" class="btn btn-danger swal-tolak" data-tolak="{{$item->id}}" data-namas="{{$item->nama}}"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                     
                </tr>
                    
                @empty
            
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</section>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        // Validasi sweet alert button validasi
        $(".swal-validasi").click(function(e){
            id   = $(this).data('id');
            nama = $(this).data('nama');
            Swal.fire({
                    title: 'Apakah kamu ingin validasi  ini?',
                    text: `Tekan Iya Untuk Mengirimkan Feedback ke Akun ${nama}, Link untuk Login akan di Sematkan untuk proses menuju Dashboard Mentor!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Validasi Selesai!',
                        'Validasi Berhasil.',
                        'success'
                        )
                        $(`#validasi_send${id}`).submit();
                     };
                   
                }
                
                )
                
        })   
        
        
        // Validasi sweet alert Tolak

         // Validasi sweet alert button validasi
         $(".swal-tolak").click(function(e){
            idTolak = $(this).data('tolak');
            namas = $(this).data('namas');
            Swal.fire({
                    title: 'Apakah kamu ingin Menolak  ini?',
                    text: `Tekan Iya Untuk Mengirimkan Feedback ke Akun ${namas}, Bahwa Proses Validasi Gagal!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Berhasil Mengirim Feedback!',
                        'Validasi di Tolak',
                        'success'
                        )
                        $(`#validasi_tolak${idTolak}`).submit();
                     };
                   
                }
                
                )    
                
        })          

    </script>

    


@endsection
