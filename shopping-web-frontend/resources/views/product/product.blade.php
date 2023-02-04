@php
$baseUrl='http://127.0.0.1:8000';
@endphp
@extends('layouts.master')

@section('title')
<title>Product Detail Page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('product/main.css') }}">
@endsection
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img class="product-feature-image" src="{{ asset($baseUrl.$product->feature_image_path) }}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($product->productsImages->chunk(3) as $arrProductImageItem)
                                    <div class="item @if ($loop->first) active @endif">
                                    @foreach ($arrProductImageItem as $productImageItem)
                                        <a href=""><img class="product-images" src="{{ asset($baseUrl.$productImageItem->image_path) }}" alt=""></a>
                                    @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            @if (strtotime(date('Y-m-d H:i:s'))-strtotime($product->created_at)<=259200)
                            <img src="{{ asset('Eshopper/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                            @endif
                            <h2>{{ $product->name }}</h2>
                            <p>Web ID: 1089772</p>
                            <img src="{{ asset('Eshopper/images/product-details/rating.png') }}" alt="" /><br>
                            <span>
                                <span>{{ number_format($product->price) }}₫</span>
                                <label>Quantity:</label>
                                <input type="text" value="3" />
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> LV</p>
                            <a href=""><img src="{{ asset('Eshopper/images/product-details/share.png') }}" class="share img-responsive"
                                    alt="" /></a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">MIÊU TẢ</a></li>
                            <li><a href="#brandprofile" data-toggle="tab">THÔNG TIN THƯƠNG HIỆU</a></li>
                            <li><a href="#tag" data-toggle="tab">SẢN PHẨM LIÊN QUAN</a></li>
                            <li ><a href="#reviews" data-toggle="tab">ĐÁNH GIÁ (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <!--Product Description-->
                        @include('product.components.product_description')
                        <!--/Product Description-->
                        <!--Product Brand-->
                        @include('product.components.product_brand')
                        <!--/Product Brand-->
                        {{-- product tag --}}
                        @include('product.components.product_tags')
                        {{-- /product tag --}}
                        <!--Product Reviews-->
                        @include('product.components.product_review')
                        <!--/Product Reviews-->
                    </div>
                </div>
                <!--/category-tab-->
                
                <!--recommended_items-->
                @include('components.recommend_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset('product/main.js') }}"></script>
@endsection