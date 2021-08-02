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
                 
               </div>
            </div>
        </section >
        <!-- ***** Features Small End ***** -->

@endsection



