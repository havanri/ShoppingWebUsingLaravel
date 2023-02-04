@extends('layouts/admin')


@section('title')
<title>Create Setting</title>
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Setting','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="/admin/settings/" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="InputConfigKey">Config key:</label>
                            <input type="text" name="config_key" class="form-control" id="InputConfigKey"
                                placeholder="Enter ConfigKey">
                        </div>
                        <div class="form-group">
                            <label for="InputConfigValue">Config value:</label>
                            <input type="text" name="config_value" class="form-control" id="InputConfigValue"
                                placeholder="Enter ConfigValue">
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