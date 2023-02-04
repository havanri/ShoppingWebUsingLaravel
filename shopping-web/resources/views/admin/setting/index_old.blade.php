@extends('layouts/admin')


@section('title')
    <title>Setting</title>
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('admins/setting/index/list.css ')}}">
@endsection
 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'setting','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/settings/create" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Config Key</th>
                        <th scope="col">Config Value</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($settings); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $settings[$i]->config_key }}</td>
                            <td>{{ $settings[$i]->config_value}}</td>
                            <td style="display: flex;">
                                <a href="/admin/settings/edit/{{ $settings[$i]->id }}" class="btn btn-success btn-md active" role="button" aria-pressed="true">Edit</a>|
                                <a href="" data-url="http://127.0.0.1:8000/admin/settings/delete/{{ $settings[$i]->id }}" class="btn btn-danger btn-md active  action_delete" role="button" aria-pressed="true">Delete</a>
                            </td>
                        </tr>
                        @endfor  
                    </tbody>
                  </table>
            </div>
            <div class="col-md-12">
              {{ $settings->links('pagination::bootstrap-4') }}
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
  <script src="{{ asset('admins/setting/index/list.js') }}"></script>
@endsection