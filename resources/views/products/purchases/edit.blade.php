@extends('layouts.app')
@section('title','Edit Product Purchase')
@section('content')
    <div class="content-wrapper">
        <div class="row" >
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home text-muted hover-cursor"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                            <form id="product_add" method="post" action="{{ route('product-purchases.update', $data['id']) }}" class="form-horizontal">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="box-body">
    
                                    <div class="col-sm-12">
                                        <div class="form-group mt-3 product_id">
                                            <label for="products" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Name 
                                                <span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-12">
                                                <select name="product_id" id="product_id" class="form-control">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $item)
                                                        <option {{ $data['product_id'] == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first("product_id") }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 quantity">
                                                <label for="quantity" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product quantity 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="number" name="quantity" class="form-control f-14" id="quantity" placeholder="Product quantity" value="{{ $data['quantity'] }}">
                                                    <span class="text-danger">{{ $errors->first("quantity") }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 total_amount">
                                                <label for="total_amount" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Total Price 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="number" name="total_amount" class="form-control f-14" id="total_amount" placeholder="Total Price" value="{{ $data['total_amount'] }}">
                                                    <span class="text-danger">{{ $errors->first("total_amount") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
    
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-width-100">Create</button>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
<script type="text/javascript">

   $(document).ready(function() {
        $('#product_id').select2();
    });

</script>
@endsection
