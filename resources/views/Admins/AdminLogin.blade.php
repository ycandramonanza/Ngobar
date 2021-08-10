@extends('MasterLogin')
@section('contentLogin')
<div class="login-wrapper my-auto">
  <h1 class="login-title">Log in Admin</h1>
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
    <input type="hidden" name="role" value="Admin">
    <div class="form-group">
      <label for="email">Username / Email</label>
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
</div>

@endsection

         
