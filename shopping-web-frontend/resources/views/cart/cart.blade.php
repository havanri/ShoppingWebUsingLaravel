@php
$baseUrl='http://127.0.0.1:8000';
@endphp
@extends('layouts.master')

@section('title')
<title>Cart Page</title>
@endsection

@section('css')

@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh</td>
                        <td class="product">Sản Phẩm</td>
                        <td class="price">Đơn Giá</td>
                        <td class="quantity">Số Lượng</td>
                        <td class="total">Số Tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php($total = 0)
                    @if (!empty($products))
                    @foreach ($products as $productItem)
                    @foreach($productsOfCartFromLocal as $productOfCartItem)
                    @if ($productItem->id==$productOfCartItem->id)
                    <tr class="single-product-cart">
                        <input class="cart_product_id" type="hidden" value="{{ $productItem->id }}">
                        <td class="cart_product">
                            <a href=""><img class="cart_product_img"
                                    src="{{ asset($baseUrl.$productItem->feature_image_path) }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $productItem->name }}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price"><p>{{ number_format($productItem->price) }} ₫</p></td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <button class="cart_quantity_up"
                                    onclick="addProductFromCart({{ $productItem->id }})">+</button>
                                <input class="cart_quantity_input" type="number" name="quantity"
                                    value="{{ $productOfCartItem->quan }}" autocomplete="off" size="1" min="1"
                                    max="500">
                                <button class="cart_quantity_down"
                                    onclick="removeProductFromCart({{ $productItem->id }})">-</button>
                            </div>
                        </td>
                        <td class="cart_total"><p class="cart_total_price">{{number_format($productItem->price*$productOfCartItem->quan) }} ₫</p></td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="#myModal" data-toggle="modal"  onclick="setCookieProductChooseDelete({{ $productItem->id }})"><i
                                    class="fa fa-times"></i></a>
                        </td>
                        @php($total+=$productItem->price*$productOfCartItem->quan)
                    </tr>
                    @endif

                    @endforeach
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền tạm : <span id="cart-sub-total">{{ number_format($total) }} ₫</span></li>
                        <li>Thuế : <span>Miễn phí</span></li>
                        <li>Phí vận chuyển :<span>Miễn phí</span></li>
                        <li>Tổng tiền : <span id="cart-total"> {{ number_format($total)}} ₫</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Cập Nhật</a>
                    <a class="btn btn-default check_out" href="{{ route('checkout.index') }}">Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">x</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-delete-product" onclick="deleteProductInCart()" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--/#do_action-->
@endsection

@section('js')

@endsection