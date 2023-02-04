@extends('layouts/admin')


@section('title')
<title>Edit Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="/admin/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="form-group">
                            <label for="InputProductName">Name:</label>
                            <input type="text" name="name" class="form-control" id="InputProductName"
                                placeholder="Enter ProductName" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="InputProductPrice">Price:</label>
                            <input type="number" name="price" class="form-control" id="InputProductPrice"
                                placeholder="Enter ProductPrice" value={{ $product->price }} required>
                        </div>
                        <div class="form-group">
                            <label for="InputFeatureImage">FeatureImage:</label>
                            <input type="file" name="feature_image" class="form-control-file" id="InputFeatureImage">
                            <div class="col-md-4 container_feature_image">
                                <div class="row">
                                  <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputImages">ImagesDetail:</label>
                            <input type="file" name="image_path[]" class="form-control-file" id="InputImages" multiple>
                            <div class="col-md-12 container_image_detail" >
                              <div class="row">
                                  @foreach ($product->productImages as $imageItem)
                                    <div class="col-md-3">
                                      <img class="image_detail" src="{{ $imageItem->image_path }}" alt="">
                                    </div>
                                  @endforeach
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="SelectCategory">CategoryName:</label>
                            <select class="form-control" id="SelectCategory" name="category_id">
                                <option value="0">--None--</option>
                                {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach --}}
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="SelectTags">Tags:</label>
                            <select name="tags[]" id="SelectTags" class="form-control" multiple="multiple" >
                                @foreach ($product->tags as $tagItem)
                                    <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="InputContent">Content:</label>
                            <textarea name="content" id="InputContent" class="form-control tinymce-init"
                                rows="15">{{ $product->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/select2/select2js.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js"></script>
<script src="{{ asset('admins/tinymce/tinyjs.js') }}"></script>

@endsection