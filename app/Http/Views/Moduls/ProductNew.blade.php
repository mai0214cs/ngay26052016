<section id="latest" class="row">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
        <ul class="thumbnails">
            @foreach($products as $product)
            <li class="span3">
                <a class="prdocutname" href="/product/{{$product['alias']}}">{{$product['name']}}</a>
                <div class="thumbnail">
                    <a href="/product/{{$product['alias']}}"><img alt="{{$product['name']}}" src="{{imageReset($product['avatar'])}}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            @if($product['promotionprice']==0&&$product['price']==0)
                            <div class="pricenew">Contact</div>
                            @else
                            <div class="pricenew">{{number_format($product['promotionprice']>0?$product['promotionprice']:$product['price'], 0, ',', '.')}}</div>
                            @endif
                            @if($product['promotionprice']>0&&$product['price']>0)
                            <div class="priceold">{{number_format($product['price'], 0, ',', '.')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>