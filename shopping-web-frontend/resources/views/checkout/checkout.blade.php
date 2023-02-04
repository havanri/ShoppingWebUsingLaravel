@php
$baseUrl='http://127.0.0.1:8000';
@endphp
@extends('layouts.master')
@section('title')
<title>Checkout Page</title>
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Đặt hàng</h2>
        </div>
        <!--/register-req-->

        <form action="{{ route('checkout.orderSuccess') }}" class="shopper-informations" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-7 clearfix">
                    <div class="bill-to">
                        <p>Thông tin hoá đơn</p>
                        <!--delivery_address_info-->
                        @include('checkout.components.form_delivery_address')
                        <!--/delivery_address_info-->
                        <div class="payment-options">
                            <h4 style="display: block!important;">Phương thức thanh toán</h4>
                            <span>
                                <label><input name="payment_method" type="radio" checked>Thanh toán khi nhận
                                    hàng(COD)</label>
                            </span>
                            <span>
                                <label><input name="payment_method" type="radio">Thẻ tín dụng/ghi nợ</label>
                            </span>
                            <span>
                                <label><input name="payment_method" type="radio">Thanh toán bằng PayPal</label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="order-message">
                        <p>Ghi chú đặt hàng</p>
                        <textarea name="notes"
                            placeholder="Ghi chú về đơn đặt hàng của bạn,ghi chú đặc biệt khi giao hàng..."
                            rows="16"></textarea>
                    </div>
                </div>
            </div>
            <!--cart product-->
            @include('checkout.components.cart_product')
            <!--/cart product-->

        </form>

    </div>
</section>
@endsection

@section('js') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{ asset('main/address.js') }}"></script>
@endsection