@extends('MasterMentor')
@section('tittle')
<title>Table-Kelas</title>
@section('contentMentor')
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
        <h3>Table Kelas</h3>
    </div>
</div>
</div>
<section class="section">
<div class="card">
    <div class="card-header">
        <a href="{{route('Create-Kelas-Premium')}}"  class="btn btn-outline-primary"><i class="fas fa-plus"></i> Kelas Premium <i class="fas fa-star text-warning"></i></a>
        <a href="{{route('Create-Kelas-Free')}}"  class="btn btn-outline-primary"><i class="fas fa-plus"></i> Kelas Gratis </i></a>
    </div>
    @if (session('pesan'))
    <div class="alert alert-success">
        {{ session('pesan') }}
    </div>
    @endif
    <div class="card-body table-responsive">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Status</th>
                    <th>Nama Kelas</th>
                    <th>Deskripsi</th>
                    <th>Image</th>
                    <th>Harga</th>
                    <th>Harga Diskon</th>
                    <th>Create Materi</th>
                    <th>Status Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->kode_kelas}}</td>
                    <td>{{$item->status_kelas}}</td>
                    <td>{{$item->nama_kelas}}</td>
                    <td><button class="btn btn-info desc" data-desc="{{$item->desc}}"><i class="fas fa-info-circle"></i></button></td>
                    <td><button class="btn btn-primary image" data-image="{{asset('storage/gambar_kelas/'.$item->mentor->id.'/'. $item->image)}}" data-kelas="{{$item->nama_kelas}}"><i class="fas fa-image"></i></i></button></td>
                    <td>Rp. {{number_format($item->harga)}}</td>
                    <td>Rp. {{number_format($item->harga_diskon) ? number_format($item->harga_diskon) : "N/A"}}</td>
                    <td>
                        <a href="{{route('Create-Materi-Kelas', $item->id)}}" class="btn btn-success"><i class="far fa-plus-square"></i></a>
                    </td> 
                    <td>{{$item->progres}}</td>   
                    <td>
                        <form>
                            <a href="{{route('Edit-Kelas', $item->id)}}" class="btn btn-success editKelas" data-progres ="{{$item->progres}}"><i class="fas fa-pen-square" ></i></a>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('Delete-Kelas', $item->id)}}" method="Post" id="hapusKelas{{$item->id}}">
                            @csrf
                            @method('Delete')
                            <button type="button" class="btn btn-danger hapusKelas" data-id="{{$item->id}}" data-progres = "{{$item->progres}}"><i class="fas fa-trash-alt"></i></button>
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

       //  sweet alert deskripsi akun
       $(".desc").click(function(e){
          let  desc = $(this).data('desc');
            Swal.fire({
            title: 'Deskripsi',
            text: desc,
            })
                
        })   

// ==============================================================================================================
             //  sweet alert image
       $(".image").click(function(e){
        let  image = $(this).data('image');
        let  namaKelas = $(this).data('kelas');
        Swal.fire({
            title: namaKelas,
            html: '<i class="fas fa-laptop-code"></i>Ngobar',
            imageUrl: image,
            imageWidth: 450,
            imageHeight: 300,
            imageAlt: 'Custom image',
            }) 
        })   


// ==================================================================================================
// Hapus Kelas

  //  sweet alert hapus akun
  $(".hapusKelas").click(function(e){
            id      = $(this).data('id');
            progres = $(this).data('progres');

            console.log(progres);

            if(progres == 'Publish'){
                Swal.fire({
                    icon: 'error',
                    title: 'Kelas Dalam Status Publish',
                    text: 'Kamu Tidak Bisa Menghapus Kelas!',
                    })
                    e.preventDefault();
            }else{

                Swal.fire({
                    title: 'Apakah kamu ingin Menghapus Kelas ini?',
                    text: "Jika Iya Maka Kelas Ini akan di Hapus Secara Permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Kelas Berhasil di Hapus!',
                        'Penghapusan Berhasil.',
                        'success'
                        )
                        $(`#hapusKelas${id}`).submit();
                     };
                   
                }
                
                )
                

            }

           
        })   



// Manipulasi edit kelas ketika status publish tidak bisa di edit

$('.editKelas').click(function(e){
    
    progres = $(this).data('progres');

        if(progres == "Publish"){
            Swal.fire({
                    icon: 'error',
                    title: 'Kelas Dalam Status Publish',
                    text: 'Kamu Tidak Bisa Mengedit Kelas!',
                    })

            event.preventDefault();
        }
    
})

      

    </script>


@endsection 
