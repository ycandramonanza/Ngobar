@extends('MasterAdmin')
@section('tittle')
<title>Table-User-Nonaktif</title>
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
        <h3>Table User Nonaktif</h3>
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
                    <th>Status Akun</th>
                    <th>Aktif</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <form>
                        <button type="button" class="btn btn-danger status-akun"  data-name ="{{$item->name}}" data-status = "{{$item->status}}" data-images="{{asset('Pavicon/user.png')}}" data-bergabung = "{{$item->updated_at->format('d-m-Y')}}" ><i class="far fa-user-circle"></i></button>
                       </form>
                    </td>
                    
                    <td>
                        <form action="{{route('Aktif', $item->id)}}" method="POST" id="aktif{{$item->id}}">
                            @csrf
                            @method('PATCH')
                                 <button type="button" class="btn btn-success aktifAkun" data-id="{{$item->id}}"><i class="fas fa-user"></i></button>
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

        //  sweet alert aktif akun
        $(".aktifAkun").click(function(e){
            id = $(this).data('id');
            console.log(id)
            Swal.fire({
                    title: 'Apakah kamu ingin Aktifkan akun ini?',
                    text: "Jika Iya Maka Akun Ini akan di Aktifkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Akun Aktif!',
                        'Pengaktifan Berhasil.',
                        'success'
                        )
                        $(`#aktif${id}`).submit();
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

            // status Aktif/Nonaktif ->merubah btn success dan danger
            if(status == 'Aktif'){

                Swal.fire({
                title: `${nama} <b class="btn-success p-1 mt-5 rounded" style="font-size:16px;">${status}<b>`,
                text: `Bergabung sejak ${bergabung}`,
                imageUrl: images,
                imageWidth: 200,
                imageHeight: 200,
                })

            }else{

                Swal.fire({
                title: `${nama} <b class="btn-danger p-1 mt-5 rounded" style="font-size:16px;">${status}<b>`,
                text: `Dinonaktifkan Sejak ${bergabung}`,
                imageUrl: images,
                imageWidth: 200,
                imageHeight: 200,
                })

            }
 
          

        
                
        })
 

      

    </script>


@endsection 
