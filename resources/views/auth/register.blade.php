@extends('layouts.login')
@section('title','Register')
@section('content')
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        @if(config('app.logo'))
            <div class="brand-logo text-center">
                <img class="login-logo" src="{{ asset(config('app.logo')) }}" alt="logo">
            </div>
        @endif
        <h4  class="text-center">Register</h4>
        <form class="pt-3" method="POST" action="{{ route('user-register') }}">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach($errors->all() as $error)
                        <strong>{!! $error !!}</strong><br>
                    @endforeach
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {!! session()->get('success') !!}
                </div>
            @endif
            <div class="form-group">
                <input placeholder="Enter name" type="text" class="form-control" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <input id="exampleInputEmail1" placeholder="Enter email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <input id="exampleInputPassword1" placeholder="Enter password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required>
            </div>
            <div class="form-group">
                <input  placeholder="Enter confirmation password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary font-weight-medium">
                    REGISTER
                </button>
            </div>
            <div class="text-center mt-4 font-weight-light">
                Already registered? <a href="{{ route('login') }}" class="font-weight-normal">Login</a>
            </div>
        </form>
    </div>
@endsection
