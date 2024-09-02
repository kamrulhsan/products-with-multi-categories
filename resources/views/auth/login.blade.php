@extends('layouts.login')
@section('title','Login')
@section('content')
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        @if(config('app.logo'))
            <div class="brand-logo text-center">
                <img class="login-logo" src="{{ asset(config('app.logo')) }}" alt="logo">
            </div>
        @endif
        <h4  class="text-center">Login</h4>
        <form class="pt-3" method="POST" action="{{ route('login') }}">
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
                <input id="exampleInputEmail1" placeholder="Enter email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="form-group">
                <input id="exampleInputPassword1" placeholder="Enter password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary font-weight-medium">
                    LOGIN
                </button>
            </div>
            <div class="text-right mt-2 font-weight-light">
                <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
            </div>
            <div class="text-center mt-4 font-weight-light">
                 <a href="{{ route('register') }}" class="font-weight-normal">Create New Account </a>
            </div>
        </form>
    </div>
@endsection
