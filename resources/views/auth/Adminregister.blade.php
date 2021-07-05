<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Register Ngobar.com</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="Template-login/assets/css/login.css">
  <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
             <h2> <i class="fas fa-laptop-code"></i> Ngobar.com</h2>   
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Buat Akun Admin</h1>
            @if (session('pesan'))
            <div class="alert alert-danger">
                {{ session('pesan') }}
            </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group">
                <label for="email">Nama</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
              <div class="form-group mb-4">
                <label for="password">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password-confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
              <input class="btn btn-block  login-btn" type="submit" value="Buat Akun">
            </form>
            <p class="login-wrapper-footer-text">Kamu Sudah Punya Akun Admin? <a href="{{ route('login') }}" class="text-reset">Log In disini</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="Template-login/assets/images/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('fontawesome-free-5.15.3-web/js/all.min.js')}}"></script>
</body>
</html>
