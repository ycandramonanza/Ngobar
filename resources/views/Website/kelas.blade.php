@extends('MasterWebsite')
@section('contentWebsite')
    
        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row mt-5">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 id="kelasNgoding" class="text-center">Selamat Datang  di <strong>Kelas Ngobar</strong></h1>
                            <p><strong> Banyak pilihan kelas yang dapat kamu ikuti disini, dari yang gratis hingga yang premium, cari kelas favoritmu, Masih bingung mau mulai dari mana ? <a href="{{route('Alur-Belajar')}}" style="color:rgb(248, 232, 88)"><i class="far fa-hand-point-right"></i> klik disini</a> untuk melihat alur belajar nya.</strong></p>
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
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h1 class="mb-5 text-dark">
                            <img src="{{asset('Pavicon/blackboard.png')}}" width="70" alt="">  Daftar Kelas
                        </h1>
                    </div>
                    <div class="row">
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
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
                                          <a href="{{route('Kelas-Detail')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                                <div class="container">
                                    <div class="card">
                                        <div class="icon mb-3 text-center">
                                            <i><img src="{{asset('Pavicon/vue.jpeg')}}" class="img-fluid" style="width:350px; height:200px" alt=""></i>
                                        </div>
                                        <div class="mentor text-center">
                                            <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                            <p class="service-title">Candra Monanza</p>
                                        </div>
                                        <div class="card-body">
                                          <h5 class="card-title">Belajar Vue Js <span style="font-size:15px" class="btn-light p-1 rounded"><i class="fas fa-star text-warning"></i> Premium</span></h5>
                                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                          <div class="info mt-3" style="font-size: 13px">
                                              <span style="background-color: rgb(46, 46, 46);" class="text-white p-2 rounded">Text Editor</span>
                                              <span style="background-color: rgb(230, 196, 6);" class="text-white p-2 rounded">Javascript</span>
                                              <span></span>
                                          </div>
                                          <a href="{{route('Kelas-Detail')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                        </div>
                                      </div>
                                </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                                  <div class="container">
                                    <div class="card">
                                        <div class="icon mb-3 text-center">
                                            <i><img src="{{asset('Pavicon/html.png')}}" class="img-fluid"style="width:350px; height:200px" alt=""></i>
                                        </div>
                                        <div class="mentor text-center">
                                            <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                            <p class="service-title">Candra Monanza</p>
                                        </div>
                                        <div class="card-body">
                                          <h5 class="card-title">Belajar HTML Dasar <span style="font-size:15px" class="btn-success p-1 rounded">Gratis</span></h5>
                                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                          <div class="info mt-3" style="font-size: 13px">
                                              <span style="background-color: rgb(46, 46, 46);" class="text-white p-2 rounded">Text Editor</span>
                                              <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                              <span></span>
                                          </div>
                                          <a href="{{route('Kelas-Detail')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Masuk Kelas</a>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
               </div>
            </div>
        </section >
        <!-- ***** Features Small End ***** -->

@endsection



