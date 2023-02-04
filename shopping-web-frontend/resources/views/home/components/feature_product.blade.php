<div class="features_items">           
    <h2 class="title text-center">Sản Phẩm Nổi Bật</h2>
    @foreach ($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset($baseUrl.$product->feature_image_path )}}" alt="" />
                    <h2>{{ number_format($product->price) }}<u>₫</u></h2>
                    <p>{{ $product->name }}</p>
                    <a href="" class="btn btn-default add-to-cart"><i
                            class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{ number_format($product->price) }}<u>₫</u></h2>
                        <div><a href="{{ route('product.index',['slug'=>$product->slug,'id'=>$product->id]) }}" class="feature-product-name">{{ $product->name }}</a></div>
                        <a href="#" class="btn btn-default add-to-cart" onclick="addToCart({{ $product->id }})"><i
                                class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
                @if (strtotime(date('Y-m-d H:i:s'))-strtotime($product->created_at)<=259200)
                <img src="{{ asset('Eshopper/images/home/new.png') }}" class="new" alt="" />
                @endif
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>