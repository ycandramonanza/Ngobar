@extends('MasterAdmin')
@section('tittle')
<title>Table-Akun-Mentor-All</title>
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
        <h3>Table Akun Mentor All</h3>
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
        {{-- Simple Datatable --}}
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Akun</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Hapus Akun</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><span class="status">{{$item->status}}</span></td>
                    <td>
                        <form action="{{route('Hapus-Akun-Mentor', $item->id)}}" method="POST" id="hapusAkun{{$item->id}}">
                            @csrf
                                 <button type="button" class="btn btn-danger hapusAkun" data-id="{{$item->id}}"><i class="far fa-trash-alt"></i></button>
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

        //  sweet alert hapus akun
        $(".hapusAkun").click(function(e){
            id = $(this).data('id');
            Swal.fire({
                    title: 'Apakah kamu ingin Menghapus akun ini?',
                    text: "Jika Iya Maka Akun Ini akan di Hapus Secara Permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Akun Berhasil di Hapus!',
                        'Penghapusan Berhasil.',
                        'success'
                        )
                        $(`#hapusAkun${id}`).submit();
                     };
                   
                }
                
                )
                
        })   

        
// ==============================================================================================================
        

       
      

    </script>


@endsection 
