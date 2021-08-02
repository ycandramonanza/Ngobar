@extends('MasterWebsite')
@section('contentWebsite')
@section('websiteCSS')
<link rel="stylesheet" href="{{asset('css/webiste.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
@endsection
@section('jquery')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
@endsection
        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text mt-5">
                <div class="container">
                    @if (session('pesan'))
                        <div class="alert alert-success">
                            {{ session('pesan') }}
                        </div>
                     @endif
                    <div class="row mt-5">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <h1 class="text-center" >{{$kelas->nama_kelas}}</h1>
                        </div>
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row text-center text-white">
                                <div class="col-12">
                                    <img src="{{asset('Pavicon/user.png')}}" alt="" id="user">
                                </div>
                                <div class="col-12 ">
                                    <span><i class="fas fa-user-graduate"></i> Mentor</span>
                                </div>
                                <div class="col-12">
                                    <span style="font-size:25px">Yegi Candra Monanza</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Header Text End ***** -->
        </div>
        <!-- ***** Welcome Area End ***** -->
        @if ($status == 'Order')
            <script>
               Swal.fire({
                    title: 'Silahkan Melakukan Pembayaran',
                    icon: 'info',
                    html:
                        'Jika sudah membayar silahkan Konfirmasi Pembayaran ke : <br><i class="fab fa-whatsapp"></i></b>, ' +
                        '<a href="https://wa.me/081214366125?text=Saya Sudah Melakukan Pembayaran">081214388125</a> ',

                    showConfirmButton: false,
                    })
            </script>
        @endif
        @if ($status == '')
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3 ">
                    <div class="container">
                        <div class="card">
                            <div class="icon mb-3 text-center">
                                <i><img src="{{asset('storage/gambar_kelas/'.$kelas->mentor->id.'/'. $kelas->image)}}" class="img-fluid"  style="width:350px; height:200px" alt=""></i>
                            </div>
                            <div class="mentor text-center">
                                <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                <p class="service-title">{{$kelas->mentor->nama}}</p>
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">{{$kelas->nama_kelas}}<span style="font-size:15px"> {{$kelas->status_kelas}}</span></h5>
                              <p class="card-text">{{$kelas->desc}}</p>
                              <hr>
                              <span>Harga : Rp.{{number_format($kelas->harga)}}</span>
                              <br>
                              <span>Harga Diskon : Rp.{{number_format($kelas->harga_diskon)}}</span>
                              <hr>
                                <div class="masukkelas">
                                    @if ($kelas->status_kelas == 'Premium')
                                    <a href="{{route('Order-Kelas', $kelas->id)}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 " data-pembayaran = '{{$kelas->harga}}'  data-pembayaranDiskon ='{{$kelas->harga}}'>Order</a>
                                    @endif
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- ***** Features Small Start ***** -->
        <section class="section mt-5" id="services bg-white">
            <div class="container">
               <hr>
               @if ($status == 'Kelas Aktif')
               <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4" >
                    <h3 class="mb-5" style="font-size: 25px">Materi {{$kelas->nama_kelas}}</h3>
                     <ul id="scrolls">
                         <div class="container alert-success p-2">
                             @foreach ($materi as $item)
                             <form action="{{route('Cari-Materi', $item->id)}}" method="GET" id="cari{{$item->id}}">
                                 @csrf
                                 <span class="text-dark" style="font-size: 20px">{{$item->sesi}}</span>
                                 <div class="carimateri mt-3">
                                     <input type="hidden" name="link_embed" value="{{$item->link_embed}}">
                                     <li class="materi submit" data-id="{{$item->id}}">{{$item->judul_materi}}</li>
                                 </div>
                            </form>
                             <hr> 
                             @endforeach
                         </div>
                     </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8  mt-5">
                     <div class="row text-center">
                         <div class="col-12 judul mb-3">
                                <h1 id="judulMateri">{{$materiawal}}</h1>
                                <hr>
                         </div>
                         <div class="col-12">
                                 <iframe id="frame" width="560" height="315" src="{{$linkembed}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: relative"></iframe>
                         </div>
                     </div>
                </div>
            </div> 
               @endif
            </div>
        </section >
        <!-- ***** Features Small End ***** -->

        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

        <script>
             $(".submit").click(function(e){
            ids = $(this).data('id');
             $(`#cari${ids}`).submit();    
        })   

           
        </script>

@endsection



