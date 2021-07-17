@extends('MasterWebsite')
@section('contentWebsite')
@section('websiteCSS')
<link rel="stylesheet" type="text/css" href="{{asset('Template-Website/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/webiste.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
@endsection
@section('jquery')
@endsection
<style>
       
 
</style>
        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row mt-5">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 id="kelasNgoding" class="text-center">Profile <strong>Mentor</strong> {{$id['nama']}}</h1>
                            <a href="#about" class="btn btn-outline-light mb-5"><i class="fas fa-search"></i> Cari Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Header Text End ***** -->
        </div>
        <!-- ***** Welcome Area End ***** -->
    
    
        <!-- ***** Features Small Start ***** -->
        <section class="section mt-5" id="services bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12   text-center ">
                            <img src="{{asset('Pavicon/user.png')}}" width="150px" alt="">
                            <div class="row">
                                <div class="col-12">
                                    <span>{{$id['nama']}}</span>
                                </div>
                                <div class="col-12">
                                    <span style="font-size: 13px; color:grey">Bergabung sejak {{$id['created_at']->format('d-M-Y')}}</span>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <span>({{number_format($id['rating'])}})</span>
                                        </div>
                                        <div class="col-12 mt-4 mb-4" id="stars">
                                            <button class="btn btn-outline-primary" id="bintang">  Beri Bintang <i class="fas fa-star text-warning"></i> </button>
                                        </div>
                                        <div class="col-12" id="rating"  style="visibility: hidden">
                                           <i class="fas fa-star  star"></i>
                                           <i class="fas fa-star  star"></i>
                                           <i class="fas fa-star  star"></i> 
                                           <i class="fas fa-star  star"></i>
                                           <i class="fas fa-star  star"></i> 
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>      
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
                        <div class="container">
                            <div class="card">
                                <div class="icon mb-3 text-center">
                                    <i><img src="{{asset('Pavicon/html.png')}}" class="img-fluid"  style="width:350px; height:200px" alt=""></i>
                                </div>
                                <div class="mentor text-center">
                                    <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                    <p class="service-title">Candra Monanza</p>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title">Belajar HTML Dasar <span style="font-size:15px" class="btn-success p-1 rounded">Gratis</span></h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                  <div class="info mt-3" style="font-size: 13px">
                                      <span style="background-color: rgb(43, 43, 43);" class="text-white p-2 rounded">Text Editor</span>
                                      <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                      <span></span>
                                  </div>
                                  <a href="#" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
                        <div class="container">
                            <div class="card">
                                <div class="icon mb-3 text-center">
                                    <i><img src="{{asset('Pavicon/html.png')}}" class="img-fluid"  style="width:350px; height:200px" alt=""></i>
                                </div>
                                <div class="mentor text-center">
                                    <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                    <p class="service-title">Candra Monanza</p>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title">Belajar HTML Dasar <span style="font-size:15px" class="btn-success p-1 rounded">Gratis</span></h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                  <div class="info mt-3" style="font-size: 13px">
                                      <span style="background-color: rgb(43, 43, 43);" class="text-white p-2 rounded">Text Editor</span>
                                      <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                      <span></span>
                                  </div>
                                  <a href="#" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
                        <div class="container">
                            <div class="card">
                                <div class="icon mb-3 text-center">
                                    <i><img src="{{asset('Pavicon/html.png')}}" class="img-fluid"  style="width:350px; height:200px" alt=""></i>
                                </div>
                                <div class="mentor text-center">
                                    <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                    <p class="service-title">Candra Monanza</p>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title">Belajar HTML Dasar <span style="font-size:15px" class="btn-success p-1 rounded">Gratis</span></h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                  <div class="info mt-3" style="font-size: 13px">
                                      <span style="background-color: rgb(43, 43, 43);" class="text-white p-2 rounded">Text Editor</span>
                                      <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                      <span></span>
                                  </div>
                                  <a href="#" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </section >
        <!-- ***** Features Small End ***** -->
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

    
    
@endsection



