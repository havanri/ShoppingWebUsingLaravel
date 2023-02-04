<div class="review-payment">
    <h2>Thông Tin Đơn Hàng</h2>
</div>
<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Hình ảnh</td>
                <td class="description">Sản phẩm</td>
                <td class="price">Đơn giá</td>
                <td class="quantity">Số lượng</td>
                <td class="total">Số tiền</td>
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
                            <p>{{ $productOfCartItem->quan }}</p>
                        </td>
                        <td class="cart_total"><p class="cart_total_price">{{number_format($productItem->price*$productOfCartItem->quan) }} ₫</p></td>
                        @php($total+=$productItem->price*$productOfCartItem->quan)
                    </tr>
                    @endif

                    @endforeach
                    @endforeach
                    @endif
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="2">
                    <table class="table table-condensed total-result">
                        <tr>
                            <td>Tổng tiền hàng</td>
                            <td style="float: right;">{{ number_format($total) }} ₫</td>
                        </tr>
                        <tr>
                            <td>Thuế </td>
                            <td style="float: right;">Miễn phí</td>
                        </tr>
                        <tr class="shipping-cost">
                            <td>Phí vận chuyển</td>
                            <td style="float: right;">Miễn phí</td>
                        </tr>
                        <tr>
                            <td>Tổng thanh toán</td>
                            <td style="float: right;"><span>{{ number_format($total) }} ₫</span></td>
                            <input type="hidden" name="total" value="{{ $total }}">
                        </tr>
                        <tr>
                            <td class="td-checkout-complete" style="text-align:center!important;" colspan="2">
                                <button type="submit" class="btn btn-primary btn-checkout-complete">ĐẶT HÀNG</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>