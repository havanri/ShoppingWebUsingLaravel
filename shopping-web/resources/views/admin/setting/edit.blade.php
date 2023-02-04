@extends('layouts/admin')


@section('title')
<title>Edit Setting</title>
@endsection

@section('css')
    <link href="{{ asset('admins/setting/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'setting','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="/admin/settings/{{ $setting->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="/admin/settings/" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="InputConfigKey">Config key:</label>
                                <input type="text" name="config_key" class="form-control" id="InputConfigKey"
                                    placeholder="Enter ConfigKey" value="{{ $setting->config_key }}">
                            </div>
                            <div class="form-group">
                                <label for="InputConfigValue">Config value:</label>
                                <input type="text" name="config_value" class="form-control" id="InputConfigValue"
                                    placeholder="Enter ConfigValue" value="{{ $setting->config_value }}">
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