@extends('layouts.app')
@section('title','Add Product')
@section('page_css')
<style>
    .image-container {
            display: inline-block;
            position: relative;
            margin: 10px;
            width: 100px;
            height: 100px;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .delete-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            font-size: 12px;
        }
</style>
@endsection
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
                            <form id="product_add" method="post" action="{{ route('products.update', $data['id']) }}" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="box-body">
    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 title">
                                                <label for="title" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Title 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="title" class="form-control f-14" id="title" placeholder="Product Title" value="{{ $data['title'] }}">
                                                    <span class="text-danger">{{ $errors->first("title") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 slug">
                                                <label for="slug" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product Slug 
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="slug" class="form-control f-14" id="slug" placeholder="Category Name" value="{{ $data['slug'] }}">
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
                                                    @foreach($productCategories as $category)
                                                        <option {{ in_array($category->id, $data->categories->pluck('id')->toArray()) ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                                    @if ($data['thumbnail'])
                                        <div class="image-container col-sm-12 ml-2">
                                            <img src="{{ asset('uploads/products/thumbnails/' . $data['thumbnail']) }}" width="100px" alt="Thumbnail">
                                        </div>
                                    @endif

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

                                    <div id="image-gallery" class='col-sm-12'>
                                        @foreach ($data->images as $key => $image)
                                            <div class="image-container">
                                                <img src="{{ asset('uploads/products/product-image/' . $data['id'] . '/' . $image->image_name) }}" width="200px" alt="Image">
                                                @if ($data->images->count() > 1)
                                                    <span class="delete-icon" data-toggle="modal" data-target="#deleteModal" data-id="{{ $image->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 sku">
                                                <label for="sku" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Product SKU
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="sku" class="form-control f-14" id="sku" placeholder="Product SKU" value="{{ $data['sku'] }}">
                                                    <span class="text-danger">{{ $errors->first("sku") }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group mt-3 stock_qty">
                                                <label for="stock_qty" class="control-label  fw-bold text-md-end mb-2 mb-md-0">Stock Quantity
                                                    <span class="text-danger">*</span></label>
                                                
                                                <div class="col-sm-12">
                                                    <input type="number" name="stock_qty" class="form-control f-14" id="stock_qty" placeholder="Stock Quantity" value="{{ $data['stock_qty'] }}">
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
                                                    <textarea class="form-control f-14" name="short_description" id="short_description" cols="10" rows="5">{{ $data['short_description'] }}</textarea>
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
                                                        <option {{ $data['is_active'] == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                                                        <option {{ $data['is_active'] == 'no' ? 'selected' : '' }} value="no">No</option>
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
                                                <textarea class="form-control f-14" name="long_description" id="long_description" cols="30" rows="10">{{ $data['long_description'] }}</textarea>
                                                <span class="text-danger">{{ $errors->first("long_description") }}</span>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this image?
                </div>
                <div class="modal-footer">
                    <form id="delete-form" method="POST" action="{{url('/')}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageId = button.data('id');
        var form = $('#delete-form');
        form.attr('action', '{{url('/')}}/admin/products/' + imageId + '/delete-image'); 
    });

</script>
@endsection
