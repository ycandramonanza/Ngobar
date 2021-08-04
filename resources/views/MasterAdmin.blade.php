
<!DOCTYPE html >
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="brand">
                            <h3><i class="fas fa-laptop-code"></i> Ngobar</h3>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="Admin-User">
                        <div class="row pl-3">
                            <div class="col-12">
                                <h5 style="font-size: 18px; margin-left:30px"><i class="far fa-user"></i> {{Auth::user()->name}} </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{route('home')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-user-graduate"></i>
                                <span>Data Mentor</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="{{route('Validasi-Mentor')}}"><i class="far fa-list-alt"></i> CV Validasi</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('Mentor-All')}}"><i class="fas fa-user"></i> Mentor All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('Mentor-Aktif')}}"><i class="fas fa-chalkboard-teacher"></i> Mentor Aktif</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('Mentor-Nonaktif')}}"><i class="fas fa-user-alt-slash"></i>Nonaktif</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-users"></i>
                                <span>Data User</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="{{route('User-Pay')}}"><i class="fas fa-money-check"></i> Order     Kelas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('User')}}"><i class="fas fa-user-tie"></i> User </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('Nonaktif-User')}}"><i class="fas fa-user-alt-slash"></i> Nonaktif User  </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-cogs"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="submenu ">
                                {{-- <li class="submenu-item ">
                                    <a href="extra-component-avatar.html"><i class="far fa-user-circle"></i> Profile</a>
                                </li> --}}
                                <li class="submenu-item ">
                                    <form id="logout-form" action="{{ route('Thanks-Page-Logout') }}" method="POST">
                                        @csrf
                                            <button class="btn" style="font-size: 14px"><i class="fas fa-sign-out-alt"></i> Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3><i class="fas fa-laptop-code"></i> Ngobar</h3>
            </div>
            <div class="page-content">

                @yield('contentAdmin')

            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    @yield('tableValidasiScript')
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('fontawesome-free-5.15.3-web/js/all.min.js')}}"></script>

    <script>

      

        $('#daftarmentor').click(function(){
            alert('tes');
        })
    </script>

</body>
@include('sweetalert::alert')

</html>