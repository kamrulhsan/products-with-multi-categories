@extends('layouts.app')
@section('title','Home')
@section('content')
    <div class="content-wrapper">
        <div class="row" >
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home text-muted hover-cursor"></i> Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')

@endsection

@section('page_scripts')

</script>
@endsection
