@extends('layouts/admin')


@section('title')
    <title>Slider</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('admins/slider/index/list.css ')}}">
@endsection
 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'slider','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/sliders/create" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($sliders); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $sliders[$i]->name }}</td>
                            <td><img class="product_image_150_100" src="{{ $sliders[$i]->image_path}}" alt=""></td>
                            <td>{{ $sliders[$i]->description }}</td>
                            <td style="display: flex;">
                                <a href="/admin/sliders/edit/{{ $sliders[$i]->id }}" class="btn btn-success btn-md active" role="button" aria-pressed="true">Edit</a>|
                                <a href="" data-url="http://127.0.0.1:8000/admin/sliders/delete/{{ $sliders[$i]->id }}" class="btn btn-danger btn-md active  action_delete" role="button" aria-pressed="true">Delete</a>
                            </td>
                        </tr>
                        @endfor  
                    </tbody>
                  </table>
            </div>
            <div class="col-md-12">
              {{ $sliders->links('pagination::bootstrap-4') }}
            </div>
            
            
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
@section('js')
  <script src="{{ asset('vendors/sweetalert2/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('admins/slider/index/list.js') }}"></script>
@endsection