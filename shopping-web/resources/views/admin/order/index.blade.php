@extends('layouts.table')

@section('title')
<title>ORDER</title>
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
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
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
                    <a class="btn btn-app float-right" class="add" title="Add" href="{{ route('order.create') }}"><i
                            class="fas fa-plus-circle"></i>Add New Order</a>
                </div>
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">BẢNG SẢN PHẨM</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Đơn hàng</th>
                                        <th>Ngày</th>
                                        <th>Tình trạng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($orders); $i++) 
                                        <tr id="post-{{$orders[$i]->id}}" class="row-order">
                                        <td>#{{ $orders[$i]->id }}</td>
                                        <td>{{ $orders[$i]->created_at->format('d.m.Y')}}</td>
                                        <td><span class="block w-2 h-2 rounded-full btn" style="background-color: {{  $orders[$i]->status->color() }}"></span>
                                            {{ $orders[$i]->status->label() }}</td>
                                        <td>{{ number_format($orders[$i]->total) }}₫</td>
                                        <td class="action-col">
                                            <a class="edit" title="Edit"
                                                href="{{ route('order.edit',['id'=>$orders[$i]->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="delete action_delete active"
                                                data-url="{{ route('order.destroy',['id'=>$orders[$i]->id]) }}"
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
                        {{ $orders->links('pagination::bootstrap-4') }}
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