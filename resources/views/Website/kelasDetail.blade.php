@extends('MasterWebsite')
@section('contentWebsite')
@section('websiteCSS')
<link rel="stylesheet" href="{{asset('css/webiste.css')}}">
@endsection
@section('jquery')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
@endsection
        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text mt-5">
                <div class="container">
                    <div class="row mt-5">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <h1 id="kelasNgoding" class="text-center" >Selamat Datang  di Kelas 
                            <br>
                            <strong>HTML 5 Dasar</strong></h1>
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
    
    
        <!-- ***** Features Small Start ***** -->
        <section class="section mt-5" id="services bg-white">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h1 class="mb-5 text-dark">
                            <img src="{{asset('Pavicon/technical-support.png')}}" width="70" alt="">  Yang Perlu Kamu Siapkan
                        </h1>
                    </div>
               </div>
               <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex justify-content-center mt-2">
                        <div class="card p-5 text-center  bg-light">
                            <img src="{{asset('Pavicon/visual-studio.png')}}" class="img-fluid" width="150px" alt="">
                            <span class="mt-3">Visual Studio Code</span>
                            <span class="btn btn-outline-info mt-2">Download</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  col-md-6 col-lg-3 d-flex justify-content-center mt-2">
                        <div class="card p-5 text-center  bg-light">
                            <img src="{{asset('Pavicon/visual-studio.png')}}" class="img-fluid" width="150px" alt="">
                            <span class="mt-3">Visual Studio Code</span>
                            <span class="btn btn-outline-info mt-2">Download</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  col-md-6 col-lg-3 d-flex justify-content-center mt-2">
                        <div class="card p-5 text-center  bg-light">
                            <img src="{{asset('Pavicon/visual-studio.png')}}" class="img-fluid" width="150px" alt="">
                            <span class="mt-3">Visual Studio Code</span>
                            <span class="btn btn-outline-info mt-2">Download</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  col-md-6 col-lg-3 d-flex justify-content-center mt-2">
                        <div class="card p-5 text-center  bg-light">
                            <img src="{{asset('Pavicon/visual-studio.png')}}" class="img-fluid" width="150px" alt="">
                            <span class="mt-3">Visual Studio Code</span>
                            <span class="btn btn-outline-info mt-2">Download</span>
                        </div>
                    </div>
               </div>
               <hr>
               <div class="row">

                   <div class="col-12 col-sm-12 col-md-4 col-lg-4" >
                       <h3 class="mb-3">Materi HTML Dasar</h3>
                        <ul id="scrolls">
                            <div class="container">
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                                <li class="materi">Html</li>
                                <hr>
                                <li class="materi">Belajar</li>
                                <hr>
                            </div>
                        </ul>
                   </div>
                   <div class="col-12 col-sm-12 col-md-12 col-lg-8  mt-5">
                        <div class="row text-center">
                            <div class="col-12 judul mb-3">
                                   <h1 id="judulMateri">Perkenalan HTML</h1>
                                   <hr>
                            </div>
                            <div class="col-12">
                                    <iframe id="frame" width="560" height="315" src="https://www.youtube.com/embed/qz0aGYrrlhU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: relative"></iframe>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
        </section >
        <!-- ***** Features Small End ***** -->

@endsection



