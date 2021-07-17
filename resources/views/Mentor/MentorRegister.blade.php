@extends('MasterLogin')
@section('loginAdmin')
<title>Mentor Register Ngobar</title>
@section('contentLogin')
<div class="login-wrapper my-auto">
  <h1 class="login-title">Buat Akun Mentor</h1>
  @if (session('pesan'))
  <div class="alert alert-danger">
      {{ session('pesan') }}
  </div>
  @endif
  <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="hidden" name="role" value="Mentor">
    <div class="form-group">
      <label for="email">Username</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Username">
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
  <p class="login-wrapper-footer-text">Kamu Sudah Punya Akun Mentor? <a href="{{ route('Login-Mentor') }}" class="text-reset">Log In disini</a></p>
</div>

@endsection
          
