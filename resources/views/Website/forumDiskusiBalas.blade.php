@extends('MasterWebsite')
@section('contentWebsite')

@section('websiteCSS')
<link rel="stylesheet" href="{{asset('css/webiste.css')}}">
@endsection
@section('jquery')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="judul">
                            <h1 id="kelasNgoding" class="text-center">Forum<strong> Diskusi</strong> Balas Pertanyaan</h1>
                            <p><strong><span style="font-size: 25px; font-weight:bold" >Hi.. Renaldi,</span> Silahkan jawab pertanyaan dari teman Ngobar <strong style="font-size: 25px">Yegi Candra Monanza</strong> , Yuk kita berbagi ilmu luaskan manfaat.</strong></p>
                            <p>
                        </div>
                        <a href="" class="btn btn-outline-light mb-5 mt-5"><i class="fas fa-search"></i> Cari Kelas</a>
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
                <div class="col-12">
                        <div class="card p-3">
                            <div class="col-12">
                                <h1>Masalah Tabel dan menambahkan data di html</h1>
                                <hr>
                            </div>
                            <div class="col-12">
                                <p style="font-size:20px">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vero laborum tempore repudiandae numquam, quisquam veniam distinctio pariatur sequi maxime ea rem omnis quia tenetur atque magni repellat. Dolorum cupiditate sequi reprehenderit nulla, aspernatur mollitia molestias atque excepturi expedita. Nulla alias fuga sunt architecto optio, eius culpa veniam quia libero?</p>
                            </div>
                            <div class="col-12 mb-5" id="imageBalas">
                                <img src="{{asset('Pavicon/koding.png')}}" style="position: relative" class="img-fluid" width="800px" alt="">
                                <hr>
                            </div>
                            <div class="col-12">
                                        <img src="{{asset('Pavicon/user.png')}}" width="100px" alt="">
                                        <p style="color: rgb(87, 87, 87)">Yegi Candra Monanza</p>   
                                         <p style="font-size: 12px; margin-top:-20px;  color:grey">Di Post <span>48 Menit</span> yang lalu</p>
                            </div>
                        </div>
                     </div>
                     <div class="col-12 mt-5">
                            <div class="card p-5">
                                    <h5>Jawaban :</h5>
                                    <hr>
                                    <h4 style="color: rgb(121, 118, 118)">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis facilis numquam voluptate ratione architecto aperiam, repudiandae animi saepe rerum quod ea autem voluptatum voluptatibus possimus natus at labore qui asperiores debitis temporibus! Unde aperiam perspiciatis pariatur a quos perferendis fugiat voluptatibus iste delectus, eveniet, similique ea autem blanditiis, beatae dolorem?</h4>
                                    <div class="mt-5" id="imageBalas">
                                        <img src="{{asset('Pavicon/koding.png')}}" class="img-fluid" width="800px" alt="">
                                        <hr>
                                    </div>
                                    <div class="col-12">
                                        <img src="{{asset('Pavicon/user.png')}}" width="100px" alt="">
                                        <p style="color: rgb(87, 87, 87)">Renaldi Muhamad Rudi</p>   
                                         <p style="font-size: 12px; margin-top:-20px;  color:grey">Di Post <span>48 Menit</span> yang lalu</p> 
                                    </div>       
                            </div>
                     </div>
            </div>
            <div class="row mb-5 mt-3">
                <div class="col-12 text-center">
                    <h2>Balas Pertanyaan <i class="fas fa-question-circle"></i></a></h2>
                </div>
                <div class="col-12 text-center d-flex justify-content-center mt-5">
                    <div class="card-body  col-md-8 col-sm-12 p-5 rounded" style="background-color: rgb(248, 248, 248)">
                        <form action="">
                            <br>
                            <div class="input-group">
                                <label for="judul" style="position: absolute; z-index:1; color:rgb(153, 153, 153)" class="p-2">Jawaban Detail</label>
                                <textarea name="" class="form-control tanya p-5" id="" cols="30" rows="10" style="background-color: rgb(241, 241, 241); z-index:0" placeholder="Masukan Jawaban.."></textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <input id="fileupload" name="input2" type="file" class="form-control tanya"  data-show-upload="false" data-show-caption="true" >
                            </div>
                            <div class="input-group">
                                <button class="btn btn-primary mt-3" type="submit">Submit Jawaban</button>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
    </section >
    <!-- ***** Features Small End ***** -->
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection


