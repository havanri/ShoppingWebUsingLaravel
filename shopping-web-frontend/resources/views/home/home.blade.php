@php
$baseUrl='http://127.0.0.1:8000';    
@endphp
@extends('layouts.master')

@section('title')
<title>Home Page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('content')


  <!--slider-->
@include('home.components.slider')
  <!--/slider-->

<section >
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('components/sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                @include('home.components.feature_product')
                <!--features_items-->

                <!--category-tab-->
                @include('home.components.category_tab')
                <!--/category-tab-->

                @include('components.recommend_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<!--/Footer-->

@endsection

@section('js')
<script src="{{ asset('home/home.js') }}"></script>
@endsection