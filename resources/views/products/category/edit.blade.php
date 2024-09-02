@extends('layouts.app')
@section('title','Edit Category')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home text-muted hover-cursor"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="category_edit" method="POST" action="{{ route('product-categories.update', $data['id']) }}" class="form-horizontal">
                            @csrf
                            @method('PUT') 
                            <div class="box-body">
                                <div class="col-sm-8">
                                    <div class="form-group mt-3 category_name">
                                        <label for="category_name" class="control-label fw-bold text-md-end mb-2 mb-md-0">
                                            Category Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="text" name="category_name" class="form-control f-14" id="category_name" placeholder="Category Name" value="{{ $data['category_name'] }}">
                                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-width-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
