@extends('layouts.login')
@section('title','Reset Password')
@section('content')
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        @if(config('app.logo'))
            <div class="brand-logo text-center">
                <img class="login-logo" src="{{ asset(config('app.logo')) }}" alt="logo">
            </div>
        @endif
        <h4  class="text-center">Reset Password</h4>
        <form class="pt-3" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
                <input id="email" type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $email ?? old('email') }}" required>
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Enter password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <input id="password-confirm" placeholder="Enter confirm password" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary font-weight-medium">
                    Reset Password
                </button>
            </div>
            <div class="text-right mt-2 font-weight-light">
                <a href="{{ route('login') }}" class="font-weight-normal">Back to Login </a>
            </div>
        </form>
    </div>
@endsection
