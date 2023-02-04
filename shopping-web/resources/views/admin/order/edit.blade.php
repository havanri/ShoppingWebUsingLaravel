@extends('layouts.admin')

@section('title')
<title>Edit</title>
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
                    <h4>Đặt hàng #{{ $order->id }} chi tiết</h4>
                    <p>Thanh toán qua Trả tiền mặt khi nhận hàng</p>
                </div>
                <div class="col-md-12">
                    {{-- <a href="/admin/products/create" class="btn btn-success float-right m-2">Add</a> --}}
                    <form action="{{ route('order.edit',['id'=> $order->id ]) }}" method="POST" class="flex">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Chung</p>
                                <div class="form-group">
                                    <label for="">Ngày tạo:</label>
                                    <input type="datetime-local" name="" id="" value="{{ $order->created_at }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Status:</label>
                                    <select name="" id="">
                                        <option value="">1</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Customer:</label>
                                    <input type="text" value="Customer">
                                </div>

                            </div>
                            <div class="form-payment-delivery col-md-6">
                                <p>
                                    Thanh toán & Giao hàng
                                    <a class="edit-information-order ml-2" data-url="{{ route('order.edit',['id'=>$order->id]) }}"><i class="fa fa-edit"></i>
                                    </a>
                                </p>
                                <div>
                                    <label for="">Họ tên</label>
                                    <div>{{ $order->delivery_address->fullname }}</div>
                                    <label for="">Địa chỉ</label>
                                    <div>{{ $order->delivery_address->address }}</div>
                                    <label for="">Số điện thoại</label>
                                    <div>{{ $order->delivery_address->phone }}</div>
                                </div>
                                {{-- <div>
                                    <input type="text" name="firstname" placeholder="Họ *">
                                    <input type="text" name="middlename" placeholder="Tên đệm">
                                    <input type="text" name="lastname" placeholder="Tên *">
                                    <input type="text" name="phone" placeholder="Số điện thoại *">
                                    <input type="text" name="address" placeholder="Địa chỉ cụ thể *">
                                    <select name="province" class="form-select form-select-sm mb-3" id="city"
                                        aria-label=".form-select-sm">
                                        <option value="" selected>Tỉnh/Thành phố</option>
                                    </select>
                                    <select name="district" class="form-select form-select-sm mb-3" id="district"
                                        aria-label=".form-select-sm">
                                        <option value="" selected>Quận/Huyện</option>
                                    </select>
                                    <select name="ward" class="form-select form-select-sm" id="ward"
                                        aria-label=".form-select-sm">
                                        <option value="" selected>Phường/Xã</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                        <button type="submit">Cập nhật</button>
                    </form>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('admins/js/address.js') }}"></script>
@endsection
