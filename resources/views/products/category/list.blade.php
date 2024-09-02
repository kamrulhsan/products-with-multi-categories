@extends('layouts.app')
@section('title','Category List')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home text-muted hover-cursor"></i> Home</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>@yield('title')</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('product-categories.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            @if(session()->has('error'))
                                <div class="alert alert-danger"> {!! session()->get('error') !!} </div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success"> {!! session()->get('success') !!} </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="data_table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>
                                        <a href="{{ route('product-categories.edit', $value->id) }}" class="edit text-primary icon-size">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('product-categories.destroy', $value->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-link text-danger delete-button icon-size">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_scripts')
<script type="text/javascript">
    $(document).on('click', '.delete-button', function () {
        var form = $(this).closest('form'); 
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(function (willDelete) {
            if (willDelete) {
                form.submit(); 
            }
        });
    });
</script>
@endsection
