<div class="product-card">
    @if($product->discount_percent)<span class="discount">٪{{ $product->discount_percent }}</span>@endif
    <a href="{{ route('products.show',$product->slug) }}"><img src="{{ $product->image ?: asset('assets/images/placeholder-product.svg') }}" alt="{{ $product->name }}"></a>
    <div class="product-info">
        <div class="rating">⭐ {{ $product->rating }} <span>{{ $product->brand }}</span></div>
        <h3><a href="{{ route('products.show',$product->slug) }}">{{ $product->name }}</a></h3>
        <p>{{ $product->short_description }}</p>
        <div class="price-row">@if($product->discount_price)<span class="old-price">{{ number_format($product->price) }} تومان</span>@endif<span class="price">{{ number_format($product->final_price) }} تومان</span></div>
        <form action="{{ route('cart.add',$product) }}" method="POST" class="add-to-cart-form">@csrf<button type="submit">افزودن به سبد خرید</button></form>
    </div>
</div>
