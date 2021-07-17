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
        <div class="header-text" id="header-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" >
                        <div class="row">
                            <div class="col-12">
                                <h2 style="font-size: 50px" id="thanks" class="text-white">Terimakasih <strong>{{Session::get('nameThanks')}}</strong></h2>
                            </div>
                            <div class="col-12">
                                <p id="NgodingBarengJudul"><strong > Sampai Ketemu Lagi Ya.</strong></p>
                            </div>
                            <div class="col-12 mb-3">
                                <img src="{{asset('Pavicon/smile.png')}}" id="smile" class="img-fluid" width="100px" alt="">
                            </div>
                        </div>
                      
                        <a href="#about" class="btn btn-outline-light mb-5" id="carikelas"><i class="fas fa-search"></i> Cari Kelas</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    
@endsection

@section('indexJavascript')
   
    <script>
          document.getElementById('klik').style.display = 'none';
          document.getElementById('klik2').style.visibility = 'visible';
          console.log('klik');
    </script>
@endsection
  



