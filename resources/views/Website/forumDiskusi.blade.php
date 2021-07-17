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
        <div class="header-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 id="kelasNgoding" class="text-center">Forum<strong> Diskusi</strong></h1>
                        <p><strong> Mari kita berdiskusi, Yuk berdiskusi bareang teman teman Ngobar.</strong></p>
                        <a href="" class="btn btn-outline-light mb-5"><i class="fas fa-search"></i> Cari Kelas</a>
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
                        <img src="{{asset('Pavicon/conversation.png')}}" width="70" alt="">  Forum Diskusi Publik
                    </h1>
                </div>
                <div class="col-6 text-center">
                    <h5><strong style="font-size: 30px">Yuk Bertanya </strong>Kamu juga bisa berbagi dan membalas pertanyaan teman teman Ngobar.</h5>
                 </div>
                 <div class="col-6">
                     <a href="{{route('Forum-Diskusi-Tanya')}}" class="btn btn-light">Klik DIsini untuk Bertanya <i class="fas fa-question-circle"></i></a>
                 </div>
                 <div class="row d-flex justify-content-center mt-5">
                          <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="container">
                              <a href="{{route('Forum-Diskusi-Balas')}}">
                                <div class="card p-3" id="cardTanya">
                                  <div class="user text-center">
                                    <div class="row mt-2">
                                      <div class="col-3">
                                        <img src="{{asset('Pavicon/user.png')}}" width="100" class="rounded-circle" alt="">
                                      </div>
                                      <div class="col-9 mt-4">
                                          <span style="font-size: 16px; color:grey">Yegi Candra Monanza</span>
                                          <p style="font-size: 12px;  color:grey">Di update <span>48 Menit</span> yang lalu</p>
                                          <hr>
                                      </div>
                                      <div class="col-12 text-left">
                                        <h5 class="p-2" style="font-size: 25px; color:rgb(73, 73, 73)">Masalah Tabel dan menambahkan data di html</h5>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row">
                                            <div class="col-12">
                                                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                            </div>
                                              <div class="col-12 mt-3" style="font-size: 13px">
                                                  <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                                  <span></span>
                                              </div>
                                      </div>
                                    </div>
                                    <a href="{{route('Forum-Diskusi-Balas')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Balas</a>
                                    </div>
                                  </a>
                              </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                              <div class="container">
                                <a href="{{route('Forum-Diskusi-Balas')}}">
                                  <div class="card p-3" id="cardTanya">
                                    <div class="user text-center">
                                      <div class="row mt-2">
                                        <div class="col-3">
                                          <img src="{{asset('Pavicon/user.png')}}" width="100" class="rounded-circle" alt="">
                                        </div>
                                        <div class="col-9 mt-4">
                                            <span style="font-size: 16px; color:grey">Yegi Candra Monanza</span>
                                            <p style="font-size: 12px;  color:grey">Di update <span>48 Menit</span> yang lalu</p>
                                            <hr>
                                        </div>
                                        <div class="col-12 text-left">
                                          <h5 class="p-2" style="font-size: 25px; color:rgb(73, 73, 73)">Masalah Tabel dan menambahkan data di html</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                              <div class="col-12">
                                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                              </div>
                                                <div class="col-12 mt-3" style="font-size: 13px">
                                                    <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                                    <span></span>
                                                </div>
                                        </div>
                                      </div>
                                      <a href="{{route('Forum-Diskusi-Balas')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Balas</a>
                                      </div>
                                    </a>
                               </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                               <div class="container">
                                <a href="{{route('Forum-Diskusi-Balas')}}">
                                  <div class="card p-3" id="cardTanya">
                                    <div class="user text-center">
                                      <div class="row mt-2">
                                        <div class="col-3">
                                          <img src="{{asset('Pavicon/user.png')}}" width="100" class="rounded-circle" alt="">
                                        </div>
                                        <div class="col-9 mt-4">
                                            <span style="font-size: 16px; color:grey">Yegi Candra Monanza</span>
                                            <p style="font-size: 12px;  color:grey">Di update <span>48 Menit</span> yang lalu</p>
                                            <hr>
                                        </div>
                                        <div class="col-12 text-left">
                                          <h5 class="p-2" style="font-size: 25px; color:rgb(73, 73, 73)">Masalah Tabel dan menambahkan data di html</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                              <div class="col-12">
                                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sed? Placeat debitis est ratione labore architecto voluptatem accusamus quod facilis?.</p>
                                              </div>
                                              <div class="col-12 mt-3" style="font-size: 13px">
                                                    <span style="background-color: rgb(255, 126, 41);" class="text-white p-2 rounded">HTML</span>
                                                    <span></span>
                                              </div>
                                        </div>
                                    </div>
                                      <a href="{{route('Forum-Diskusi-Balas')}}" class="btn btn-outline-primary d-flex justify-content-center mt-3 ">Balas</a>
                                   </div>
                                </a>
                               </div>
                          </div>
                  </div>
            </div>
        </div>
    </section >
    <!-- ***** Features Small End ***** -->
        

@endsection


