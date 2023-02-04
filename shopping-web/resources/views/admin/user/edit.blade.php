@extends('layouts/admin')


@section('title')
<title>Edit User</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'User','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="/admin/users/{{ $user->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="InputName">Name:</label>
                            <input type="text" name="name" class="form-control" id="InputName"
                                placeholder="Enter Name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Email:</label>
                            <input type="email" name="email" class="form-control" id="InputEmail"
                                placeholder="Enter Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password:</label>
                            <input type="password" name="password" class="form-control" id="InputPassword"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="InputRole">Choose Roles:</label>
                            <select class="form-control" name="role_id[]" id="InputRole" multiple>
                                @foreach ($roles as $role)
                                    <option {{ $roleOfUser->contains('id',$role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/select2/select2js.js') }}"></script>
@endsection