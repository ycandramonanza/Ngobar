@extends('MasterWebsite')
@section('contentWebsite')
    
        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row mt-5">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 id="kelasNgoding" class="text-center">Daftar <strong>Mentor</strong> Ngobar</h1>
                            <p><strong>Yuk kita belajar bersama dengan mentor yang sudah berpengalaman di bidang nya,   Kamu pengen jadi mentor di Ngobar <i class="fas fa-question-circle"></i> <a href="" class="btn btn-outline-light"> Daftar disini</a></strong></p>
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
                            <img src="{{asset('Pavicon/teacher.png')}}" width="70" alt="">  Daftar Mentor
                        </h1>
                    </div>
                </div>
                <div class="row mt-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                                <div class="card p-4">
                                    <div class="mentor text-center rounded-circle">
                                        <i><img src="{{asset('Pavicon/user.png')}}" class="img-fluid"  style="width:150px" alt=""></i>
                                    </div>
                                  <div class="mentor text-center">
                                    <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                    <p class="service-title" style="font-size: 20px"><strong> Yegi Candra Monanza</strong></p>
                                  </div>
                                  <div class="card-body text-center">
                                      <div class="row">
                                        <div class="bintang col-12">
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <i class="fas fa-star text-warning"></i> 
                                            <span>(1.700)</span>
                                          </div>
                                      </div>
                                    <a href="{{route('Mentor-Profile')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Lihat Profile</a>
                                  </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card p-4">
                                <div class="mentor text-center rounded-circle">
                                    <i><img src="{{asset('Pavicon/user.png')}}" class="img-fluid"  style="width:150px" alt=""></i>
                                </div>
                              <div class="mentor text-center">
                                <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                                <p class="service-title" style="font-size: 20px"><strong> Yegi Candra Monanza</strong></p>
                              </div>
                              <div class="card-body text-center">
                                  <div class="row">
                                    <div class="bintang col-12">
                                        <i class="fas fa-star text-warning"></i> 
                                        <i class="fas fa-star text-warning"></i> 
                                        <i class="fas fa-star text-warning"></i> 
                                        <i class="fas fa-star text-warning"></i> 
                                        <i class="fas fa-star text-warning"></i> 
                                        <span>(1.700)</span>
                                      </div>
                                  </div>
                                <a href="{{route('Mentor-Profile')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Lihat Profile</a>
                              </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                        <div class="card p-4">
                            <div class="mentor text-center rounded-circle">
                                <i><img src="{{asset('Pavicon/user.png')}}" class="img-fluid"  style="width:150px" alt=""></i>
                            </div>
                          <div class="mentor text-center">
                            <span style="font-size: 13px"><i class="fas fa-user-graduate"></i> Mentor</span>
                            <p class="service-title" style="font-size: 20px"><strong> Yegi Candra Monanza</strong></p>
                          </div>
                          <div class="card-body text-center">
                              <div class="row">
                                <div class="bintang col-12">
                                    <i class="fas fa-star text-warning"></i> 
                                    <i class="fas fa-star text-warning"></i> 
                                    <i class="fas fa-star text-warning"></i> 
                                    <i class="fas fa-star text-warning"></i> 
                                    <i class="fas fa-star text-warning"></i> 
                                    <span>(1.700)</span>
                                  </div>
                              </div>
                            <a href="{{route('Mentor-Profile')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Lihat Profile</a>
                          </div>
                    </div>
                </div>
                </div>
            </div>
        </section >
        <!-- ***** Features Small End ***** -->

@endsection



