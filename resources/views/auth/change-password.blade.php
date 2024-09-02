@extends('layouts.app')
@section('title','Change Password')
@section('content')
    <div class="content-wrapper">
        <div class="row" >
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home text-muted hover-cursor"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('change-password.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($errors->any())
                                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                                            <ul>
                                                                @foreach($errors->all() as $error)
                                                                   <li><b>{!! $error !!}</b></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if(session()->has('error'))
                                                        <div class="alert alert-danger"> {!! session()->get('error') !!} </div>
                                                    @endif

                                                    @if(session()->has('success'))
                                                        <div class="alert alert-success"> {!! session()->get('success') !!} </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label>Current Password<span class="text-danger">*</span></label>
                                                        <input required type="password"  placeholder="Enter current password"
                                                               class="form-control form-control-sm" name="current_password" autocomplete="current-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>New Password<span class="text-danger">*</span></label>
                                                        <input required type="password"  placeholder="Enter current password"
                                                               class="form-control form-control-sm" name="new_password" autocomplete="current-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>New Confirm Password<span class="text-danger">*</span></label>
                                                        <input required type="password"  placeholder="Enter new confirm password"
                                                               class="form-control form-control-sm" name="new_confirm_password" autocomplete="current-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary ">Update Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

