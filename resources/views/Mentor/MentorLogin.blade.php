@extends('MasterLogin')
@section('loginAdmin')
<title>Mentor Login Ngobar</title>
@section('contentLogin')
<div class="login-wrapper my-auto">
  <h1 class="login-title">Log in Mentor</h1>
  @if (session('Logout'))
      <div class="alert alert-danger">
          {{ session('Logout') }}
      </div>
  @endif
  @if (session('Pesan'))
  <div class="alert alert-success">
      {{ session('Pesan') }}
  </div>
  @endif
  @if (session('validasi'))
  <div class="alert alert-danger">
      {{ session('validasi') }}
  </div>
  @endif
  <form method="POST" action="{{ route('login') }}">
      @csrf
    <input type="hidden" name="role" value="Mentor">
    <div class="form-group">
      <label for="name">Username / Email</label>
      <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Username/Email">
      @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
    <div class="form-group mb-4">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password ">
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <input  id="login" class="btn btn-block  login-btn" type="submit" value="Login">
  </form>
  <a href="#!" class="forgot-password-link">Lupa password?</a>
  <p class="login-wrapper-footer-text">Kamu Belum Memiliki Akun? <a href="{{ route('Register-Mentor') }}" class="text-reset">Buat Disini</a></p>
</div>

@endsection

         
