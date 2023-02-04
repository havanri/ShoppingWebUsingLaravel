@extends('layouts/admin')


@section('title')
<title>Create Permission</title>
@endsection
@section('css')
<link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Permission','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="/admin/permissions/" method="post" style="width: 100%">
                    @csrf
                    <div class="form-group">
                        <label for="SelectCategoryParent">Select Parent Permission:</label>
                        <select class="form-control" id="SelectCategoryParent" name="module_parent">
                            <option value="">--Module Name--</option>
                            @foreach (config('permissions.table_module') as $moduleItem)
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @foreach (config('permissions.module_children') as $moduleChildrenItem)
                            <div class="col-md-3">
                                <label for="">
                                    <input type="checkbox" name="module_child[]" id="" value="{{ $moduleChildrenItem }}">
                                    {{ $moduleChildrenItem }}
                                </label>
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