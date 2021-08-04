
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mentor - Home</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
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
                                <h5 style="font-size: 18px; margin-left:30px"><i class="far fa-user"></i>{{Auth::user()->name}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{route('Profile-Mentor')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-code"></i>
                                <span>Kelas</span>
                            </a>
                            <ul class="submenu ">       
                                <li class="submenu-item ">
                                    <a href="{{route('Table-Kelas')}}"><i class="fas fa-chalkboard"></i> Data Kelas</a>
                                </li>
                                {{-- <li class="submenu-item ">
                                    <a href="component-list-group.html">List Group</a>
                                </li> --}}
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
                <h3><i class="fas fa-laptop-code"></i> Ngoding Bareng</h3>
            </div>
            <div class="page-content">

                @yield('contentMentor')
            
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
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('fontawesome-free-5.15.3-web/js/all.min.js')}}"></script>
</body>
@include('sweetalert::alert')

</html>