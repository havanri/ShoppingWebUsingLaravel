@php
$baseUrl='http://127.0.0.1:8000';
@endphp
@extends('layouts.master')

@section('title')
<title>Category Page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('category/tab.css') }}">
@endsection
@section('content')

<section id="advertisement">
    <div class="container">
        <img src="{{ asset('Eshopper/images/shop/advertisement.jpg') }}" alt="" />
    </div>

</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                {{-- category --}}
                @include('components/sidebar')
                {{-- /category --}}
            </div>

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                @include('category/components/features_items')
                <!--/features_items-->
            </div>
        </div>
    </div>
</section>

@endsection