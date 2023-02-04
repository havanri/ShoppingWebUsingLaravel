@extends('layouts/admin')


@section('title')
<title>Create Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product','key'=>'Add'])
    <!-- /.content-header -->
    <!-- Main content -->
    <form action="/admin/products/" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="form-group">
                            <label for="InputProductName">Name:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="InputProductName"
                                placeholder="Enter ProductName" value="{{ old('name') }}" >
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="InputProductPrice">Price:</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="InputProductPrice"
                                placeholder="Enter ProductPrice" value="{{ old('price') }}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="InputFeatureImage">FeatureImage:</label>
                            <input type="file" name="feature_image" class="form-control-file @error('feature_image') is-invalid @enderror" id="InputFeatureImage">
                            @error('feature_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="InputImages">ImagesDetail:</label>
                            <input type="file" name="image_path[]" class="form-control-file" id="InputImages" multiple>
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
                            <select name="tags[]" id="SelectTags" class="form-control" multiple="multiple">

                            </select>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="InputContent">Content:</label>
                            <textarea name="content" id="InputContent" class="form-control tinymce-init @error('content') is-invalid @enderror"
                                rows="15" >{{ old('content') }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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