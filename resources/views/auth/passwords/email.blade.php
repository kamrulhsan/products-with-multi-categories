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
    <form class="pt-3" method="POST" action="{{ route('password.email') }}">
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
        @if(session()->has('status'))
            <div class="alert alert-success">
                {!! session()->get('status') !!}
            </div>
        @endif
        <div class="form-group">
            <input id="email" type="email" class="form-control" required
                   name="email" value="{{ old('email') }}" placeholder="Enter email" autocomplete="email" autofocus>

        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary font-weight-medium">
                Reset password
            </button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            <a href="{{ route('login') }}" class="font-weight-normal">Back to Login </a>
        </div>
    </form>
</div>
@endsection
