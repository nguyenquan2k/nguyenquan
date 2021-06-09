@extends('admin.layouts.login')
@section('title', 'Register')
@section('content')
<main class="form-signin container">
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <p>There is an errors of submit form, please see bellow!</p>
    </div>
  @endif
  <form action="{{route('register.post')}}" method="post">
    @csrf
    <img class="mb-4" src="{{ asset('assets/img/favicons/apple-touch-icon.png')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input type="text" name="name" value="" class="form-control" id="floatingInput" placeholder="">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="text" name="email" value="{{old('email', '')}}" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
        {{-- @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}
    </div>
    <div class="form-floating">
      <input type="password" name="password" value="{{old('password', '')}}" class="form-control " id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      {{-- @error('password')
     <div class="invalid-feedback">{{ $message }}</div>
     @enderror --}}
    </div>
    <div class="form-floating">
      <input type="password" name="password_confirm" value="{{old('password', '')}}" class="form-control " id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password Confirm</label>
      {{-- @error('password')
     <div class="invalid-feedback">{{ $message }}</div>
     @enderror --}}
    </div>
    <div class="form-floating">
      <input type="text" name="department_id" value="{{old('department_id', '')}}" class="form-control" id="floatingInput" placeholder="">
      <label for="floatingInput">Department ID</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
@stop 