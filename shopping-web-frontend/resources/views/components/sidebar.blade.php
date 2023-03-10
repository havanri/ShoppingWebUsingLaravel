<div class="left-sidebar">
    <h2>DANH MỤC</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach ($categoriesParent as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#cat_{{ $category->id }}">
                        @if ($category->categoryChildren->count())
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        @endif
                        {{ $category->name }}
                    </a>
                </h4>
            </div>
            <div id="cat_{{ $category->id }}" class="panel-collapse 
                @if(isset($findCat))
                    {{ $findCat->parent_id==$category->id ? 'in' : 'collapse' }}
                @else  collapse
                @endif
                ">
                <div class="panel-body">
                    <ul>
                        @foreach ($category->categoryChildren as $categoryChildItem)
                        <li><a class="{{ request('id')==$categoryChildItem->id ? 'category-item-active' : '' }}" href="{{ route('category.index',['slug'=>$categoryChildItem->slug,'id'=>$categoryChildItem->id]) }}">{{ $categoryChildItem->name }}</a></li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>THƯƠNG HIỆU</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
            </ul>
        </div>
    </div>
    <!--/brands_products-->

    <div class="price-range">
        <!--price-range-->
        <h2>KHOẢNG GIÁ</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div>
    <!--/price-range-->

    <div class="shipping text-center">
        <!--shipping-->
        <img src="{{ asset('Eshopper/images/home/shipping.jpg') }}" alt="" />
    </div>
    <!--/shipping-->

</div>