@extends('layouts.app')
@section('title','Add Product')
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
                            <form id="product_add" method="post" action="{{ route('products.store') }}" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">
    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 title">
                                                <label for="title" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Title 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="title" class="form-control f-14" id="title" placeholder="Category Name">
                                                    <span class="text-danger">{{ $errors->first("title") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 slug">
                                                <label for="slug" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Slug 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="slug" class="form-control f-14" id="slug" placeholder="Product Slug">
                                                    <span class="text-danger">{{ $errors->first("slug") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mt-3 product_categories">
                                            <label for="product_categories" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Categories 
                                                <span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-12">
                                                <select class="form-control f-14" name="product_categories[]" id="product_categories" multiple="multiple">
                                                    <option value="">Select Categories</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first("product_categories") }}</span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group mt-3 thumbnail">
                                            <label for="thumbnail" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product thumbnail 
                                                <span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-12">
                                                <input type="file" name="thumbnail" class="form-control f-14" id="thumbnail" accept="image/*">
                                                <span class="text-danger">{{ $errors->first("thumbnail") }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mt-3 images">
                                            <label for="images" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product images 
                                                <span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control f-14" id="images" name="images[]" accept="image/*" multiple>
                                                <span class="text-danger">{{ $errors->first("images") }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 sku">
                                                <label for="sku" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product SKU
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="sku" class="form-control f-14" id="sku" placeholder="Product SKU">
                                                    <span class="text-danger">{{ $errors->first("sku") }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 stock_qty">
                                                <label for="stock_qty" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Stock Quantity
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="number" name="stock_qty" class="form-control f-14" id="stock_qty" placeholder="Stock Quantity">
                                                    <span class="text-danger">{{ $errors->first("stock_qty") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 short_description">
                                                <label for="short_description" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Short Description 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <textarea class="form-control f-14" name="short_description" id="short_description" cols="10" rows="5" placeholder="Short Description"></textarea>
                                                    <span class="text-danger">{{ $errors->first("short_description") }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 is_active">
                                                <label for="is_active" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Active 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <select name="is_active" id="is_active" class="form-control f-14">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first("is_active") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mt-3 long_description">
                                            <label for="long_description" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Long Description 
                                                <span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-12">
                                                <textarea class="form-control f-14" name="long_description" id="long_description" cols="30" rows="10" placeholder="Long Description"></textarea>
                                                <span class="text-danger">{{ $errors->first("long_description") }}</span>
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
        $('#product_categories').select2();
    });

</script>
@endsection
