<div class="category-tab">
                    
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoriesChilds as $categoryItem)
                <li class="@if ($loop->first) active @endif"><a href="#category_tab_{{ $categoryItem->id }}" data-toggle="tab">{{ $categoryItem->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categoriesChilds as $categoryItem)
        <div class="tab-pane fade @if ($loop->first) active in @endif" id="category_tab_{{ $categoryItem->id }}">
            @foreach ($categoryItem->products->take(4) as $productItem)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$baseUrl.$productItem->feature_image_path }}" alt="" />
                            <h2>{{ number_format($productItem->price) }}₫</h2>
                            <p>{{ $productItem->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach     
        </div>
        @endforeach
        
    </div>
</div>