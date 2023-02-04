@extends('layouts/admin')


@section('title')
<title>Edit Slider</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'slider','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="/admin/sliders/{{ $slider->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="/admin/sliders/" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="InputSlider">Name:</label>
                                <input type="text" name="name" class="form-control" id="InputSlider"
                                    placeholder="Enter Slider" value="{{ $slider->name }}">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="InputDescription">Description:</label>
                                    <textarea name="description" id="InputDescription" class="form-control"
                                        rows="15">{{ $slider->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputImage">Image:</label>
                                <input type="file" name="image_name" class="form-control-file " id="InputImage">
                                <div class="col-md-4 container_image">
                                    <div class="row">
                                      <img class="image_name" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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

@endsection