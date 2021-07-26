<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('Pavicon/Ngobar.com.png')}}" type="image/x-icon">
    <title>Ngobar.com</title>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('Template-Website/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Template-Website/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Template-Website/assets/css/templatemo-art-factory.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Template-Website/assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Template-Website/assets/css/style.css')}}">

    {{-- Internal Css --}}
    @yield('websiteCSS')

    </head>
    
    <body style="font-family: Poppins">
    
    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   --}}
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('Landing-Page')}}" class="logo" style="text-transform:Capitalize"><i class="fas fa-laptop-code"></i> Ngobar</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="submenu" >
                                <a href="javascript:;">Kelas</a>
                                <ul>
                                    <li>
                                        <a href="{{route('Kelas')}}"> 
                                            <img src="{{asset('Pavicon/blackboard.png')}}" width="20px" alt="">  Masuk Kelas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('Alur-Belajar')}}">
                                            <img src="{{asset('Pavicon/route.png')}}" width="20px" alt=""> Alur Belajar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="scroll-to-section">
                                <a href="{{route('Forum-Diskusi')}}">Forum Diskusi</a>
                            </li>
                            <li class="scroll-to-section">
                                <a href="{{route('Mentor')}}">Mentor</a>
                            </li>
                           @guest
                                <li class="scroll-to-section">
                                    <button type="submit" class="btn btn-link  buttonlink text-white" id="klik">
                                        <i class="fas fa-sign-in-alt"></i> <span id="Masuk"> Daftar</span> 
                                    </button>
                                </li> 
                                <li class="scroll-to-section" style="visibility: hidden">
                                    <a href="{{route('Landing-Page')}}" style="font-size: 16px" class="btn btn-link  buttonlink text-white" id="klik2">
                                        <i class="fas fa-sign-in-alt"></i> <span id="Masuk"> Masuk</span> 
                                    </a>
                                </li> 
                           @endguest
                           @auth
                                 <li class="scroll-to-section">
                                    <form id="logout-form" action="{{ route('Thanks-Page-Logout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                        <button type="submit" class="btn btn-link  text-white" >
                                            <i class="fas fa-sign-out-alt"></i><span id="Masuk"> Sign Out</span> 
                                        </button>
                                    </form>
                                 </li>
                           @endauth
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

       
        @yield('contentWebsite')
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row " id="footer">
                <div class="col-lg-7 col-md-12 col-sm-12 ">
                    <a href="{{route('Landing-Page')}}" style="font-size: 30px"><i class="fas fa-laptop-code mt-5"></i> Ngobar</a> 
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 ">
                    <p class="copyright">Dibuat Oleh <strong>Yegi Candra Monanza</strong> di Tangerang, dengan penuh kasih sayang <i class="fas fa-heart" style="color: red"></i></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="https://www.instagram.com/syifapb_/?utm_medium=copy_link" class="bg-light text-dark"><i class="fab fa-instagram" style="font-size: 40px"></i></a></li>
                        <li><a href="#" class="bg-light text-dark"><i class="fab fa-facebook" style="font-size: 40px"></i></a></li>
                        <li><a href="#" class="bg-light text-dark"><i class="fab fa-twitter" style="font-size: 40px"></i></a></li>
                        <li><a href="#" class="bg-light text-dark"><i class="fab fa-whatsapp" style="font-size: 40px"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="{{asset('Template-Website/assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('Template-Website/assets/js/popper.js')}}"></script>
    <script src="{{asset('Template-Website/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fontawesome-free-5.15.3-web/js/all.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('Template-Website/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('Template-Website/assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('Template-Website/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('Template-Website/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('Template-Website/assets/js/imgfix.min.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{asset('Template-Website/assets/js/custom.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

    @yield('jqury')
    @yield('indexJavascript')
   
  </body>
  @include('sweetalert::alert')
</html>