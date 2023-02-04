@extends('layouts/admin')


@section('title')
    <title>Permission</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('admins/slider/index/list.css ')}}">
@endsection
 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'permission','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/permissions/create" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Display Name</th>
                        <th scope="col">Key Code</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($permissions); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $permissions[$i]->name }}</td>
                            <td>{{ $permissions[$i]->display_name }}</td>
                            <td>{{ $permissions[$i]->key_code }}</td>
                            <td style="display: flex;">
                                <a href="/admin/permissions/edit/{{ $permissions[$i]->id }}" class="btn btn-success btn-md active" permission="button" aria-pressed="true">Edit</a>|
                                <a href="" data-url="http://127.0.0.1:8000/admin/permissions/delete/{{ $permissions[$i]->id }}" class="btn btn-danger btn-md active  action_delete" permission="button" aria-pressed="true">Delete</a>
                            </td>
                        </tr>
                        @endfor  
                    </tbody>
                  </table>
            </div>
            <div class="col-md-12">
              {{ $permissions->links('pagination::bootstrap-4') }}
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