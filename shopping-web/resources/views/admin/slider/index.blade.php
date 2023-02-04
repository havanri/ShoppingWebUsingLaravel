@extends('layouts.table')

@section('title')
<title>MENU</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a href="/admin/products/create" class="btn btn-success float-right m-2">Add</a> --}}
                    <a class="btn btn-app float-right" class="add" title="Add" href="{{ route('slider.create') }}"><i
                            class="fas fa-plus-circle"></i>New Slider</a>
                </div>
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">BẢNG Slider</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Name</th>
                                        <th >Image</th>
                                        <th >Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($sliders); $i++) <tr>
                                        <th scope="row">{{ $i+1 }}</th>
                                        <td>{{ $sliders[$i]->name }}</td>
                                        <td><img class="product_image_150_100" src="{{ $sliders[$i]->image_path}}" alt=""></td>
                                        <td>{{ $sliders[$i]->description }}</td>
                                        <td class="action-col">
                                            <a class="edit" title="Edit"
                                                href="{{ route('slider.edit',['id'=>$sliders[$i]->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="delete action_delete active"
                                                data-url="{{ route('slider.destroy',['id'=>$sliders[$i]->id]) }}"
                                                title="Delete" href=""><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="col-md-12">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('js')

@endsection