@extends('layouts/admin')


@section('title')
    <title>Product</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('admins/product/index/list.css ')}}">
@endsection
 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/products/create" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">FeatureImage</th>
                        <th scope="col">Content</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($products); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $products[$i]->name }}</td>
                            <td>{{ number_format($products[$i]->price) }}</td>
                            <td><img class="product_image_150_100" src="{{ $products[$i]->feature_image_path}}" alt=""></td>
                            <td>{{ $products[$i]->content}}</td>
                            <td>{{ optional($products[$i]->category)->name }}</td>
                            <td style="display: flex;">
                                <a href="/admin/products/edit/{{ $products[$i]->id }}" class="btn btn-success btn-md active" role="button" aria-pressed="true">Edit</a>|
                                <a href="" data-url="http://127.0.0.1:8000/admin/products/delete/{{ $products[$i]->id }}" class="btn btn-danger btn-md active  action_delete" role="button" aria-pressed="true">Delete</a>
                            </td>
                        </tr>
                        @endfor  
                    </tbody>
                    
                  </table>
            </div>
            <div class="col-md-12">
              {{ $products->links('pagination::bootstrap-4') }}
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
  <script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection