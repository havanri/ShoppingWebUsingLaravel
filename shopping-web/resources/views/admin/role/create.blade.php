@extends('layouts/admin')


@section('title')
<title>Create Role</title>
@endsection
@section('css')
    <link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Role','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="/admin/roles/" method="post" style="width: 100%">
                    @csrf
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label for="InputName">Name:</label>
                            <input type="text" name="name" class="form-control" id="InputName" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="InputDisplayName">Display Name:</label>
                            <textarea class="form-control" name="display_name" id="DisplayName" rows="8"></textarea>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="row">    
                            <div class="col-md-12">
                                <label for="">
                                    <input type="checkbox" class="checkall">Check All
                                </label>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label for="">
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                        Module {{ $permission->name }}
                                    </label>
                                </div>
                                <div class="row">
                                    @foreach ($permission->permissionsChildren as $permissionItem)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label for="">
                                                <input type="checkbox" name="permission_id[]" value="{{ $permissionItem->id  }}" class="checkbox_children">
                                                {{ $permissionItem->display_name }}
                                            </label>
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
   
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('js')
    <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection