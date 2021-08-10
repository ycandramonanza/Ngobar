@extends('MasterAdmin')
@section('tittle')
<title>Table-User</title>
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
        <h3>Table User</h3>
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
                    <th>Nama Akun</th>
                    <th>Email</th>
                    <th>Status Akun</th>
                    <th>Profile</th>
                    <th>Nonaktif Akun</th>
                    <th>Hapus Akun</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><span class="star">{{$item->status}}</span><i class="fas fa-star text-warning"></i></td>
                    <td>
                        <form>
                     
                            <a href="" class="btn btn-primary showAkun"><i class="far fa-address-card"></i></a>
                   </form>
                    </td>
                    <td>
                        <form action="{{route('User-Nonaktif', $item->id)}}" method="POST" id="nonaktif{{$item->id}}">
                            @csrf
                            @method('PATCH')
                                 <button type="button" class="btn btn-danger nonaktifAkun" data-id="{{$item->id}}" ><i class="fas fa-user-alt-slash"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('Hapus-Akun-User', $item->id)}}" method="POST" id="hapusAkunUser{{$item->id}}" >
                            @csrf
                            @method('delete')
                                 <button type="button" class="btn btn-danger hapusAkun"  data-id="{{$item->id}}" ><i class="far fa-trash-alt"></i></i></button>
                        </form>
                    </td>   
                   
                    
                </tr>   
                    
                @endforeach
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
        $(".nonaktifAkun").click(function(e){
            id = $(this).data('id');
            Swal.fire({
                    title: 'Apakah kamu ingin Nonaktifkan akun ini?',
                    text: "Jika Iya Maka Akun Ini akan di Nonaktifkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Akun Nonaktif!',
                        'Penonaktifan Berhasil.',
                        'success'
                        )
                        $(`#nonaktif${id}`).submit();
                     };
                   
                }
                
                )
                
        })   

        
// ==============================================================================================================

// sweet alert status akun
 $('.status-akun').click(function(e){

            nama = $(this).data('name');
            status = $(this).data('status');
            images = $(this).data('images');
            bergabung = $(this).data('bergabung');
 
            Swal.fire({
                title: `${nama} <b class="btn-success p-1 mt-5 rounded" style="font-size:16px;">${status}<b>`,
                text: `Bergabung sejak ${bergabung}`,
                imageUrl: images,
                imageWidth: 200,
                imageHeight: 200,
                })

        
                
        })
 
// =========================================================================================================
// Bintang untuk status Premium
        let star    = document.getElementsByClassName('fa-star');
        let length  = star.length
        let span    = document.getElementsByClassName('star');

        for(i=0; i<length; i++){
            let cek = span[i].innerHTML;

            if(cek == 'Basic'){
                star[i].style.visibility = 'hidden';
            }else{
                star[i].style.visibility = 'visible';
            }
        }

// ===========================================================================================================
// Hapus Akun

         //  sweet alert nonaktif akun
         $(".hapusAkun").click(function(e){
            idUser = $(this).data('id');
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
                        $(`#hapusAkunUser${idUser}`).submit();
                     };
                   
                }
                
                )
                
        })   

    </script>


@endsection 
