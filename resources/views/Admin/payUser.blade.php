@extends('MasterAdmin')
@section('tittle')
<title>Table-Order-User</title>
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
        <h3>Table Order User</h3>
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
                    <th>Kelas</th>
                    <th>Konfirmasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->users->name}}</td>
                    <td>{{$item->kelas->nama_kelas}}</td>
                    <td>
                        <form action="{{route('Order-Pay', $item->id)}}" method="POST" id="order{{$item->id}}">
                            @method('PATCH')
                            @csrf
                            <button type="button" class="aktifKelas btn btn-success" data-nama="{{$item->users->name}}" data-id="{{$item->id}}" data-kelas="{{$item->kelas->nama_kelas}}">
                                Aktifkan Kelas
                            </button>
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
// =============================================================================================================

        //  sweet alert nonaktif akun
        $(".aktifKelas").click(function(e){
            id = $(this).data('id');
            nama = $(this).data('nama');
            kelas = $(this).data('kelas');
            Swal.fire({
                    title: `Apakah kamu ingin Menagktifkan kelas ${kelas} untuk akun ${nama}?`,
                    text: "Jika Iya Maka kelas ini akan aktif!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Kelas Aktif!',
                        'success'
                        )
                        $(`#order${id}`).submit();
                     };
                   
                }
                
                )
                
        })   

        
// ==============================================================================================================
 

    </script>


@endsection 
