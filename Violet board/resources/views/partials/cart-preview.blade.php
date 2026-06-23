@php
    use App\Models\Cart;
    if (auth()->check()) {
        $previewCart = Cart::with('items.product.discount')->where('user_id', auth()->id())->first();
    } else {
        $previewCart = Cart::with('items.product.discount')->where('session_id', session()->getId())->first();
    }
    $previewItems = $previewCart?->items ?? collect();
@endphp

@if ($previewItems->isNotEmpty())
    <div class="navbar-cart-preview-items">
        @foreach ($previewItems as $item)
            <a href="{{ route('product.show', $item->product_id) }}" class="navbar-cart-preview-item">
                <img src="{{ $item->product->images->first()?->url ?? '' }}" alt="{{ $item->product->name }}">
                <span class="navbar-cart-preview-name">{{ $item->product->name }}</span>
                <span class="navbar-cart-preview-qty">×{{ $item->quantity }}</span>
                <span class="navbar-cart-preview-price">{{ number_format($item->product->effectivePrice() * $item->quantity, 2) }} €</span>
            </a>
        @endforeach
    </div>
    <div class="navbar-cart-preview-total">
        <span>Total</span>
        <span>{{ number_format($previewItems->sum(fn($i) => $i->product->effectivePrice() * $i->quantity), 2) }} €</span>
    </div>
    <a href="{{ route('cart') }}" class="navbar-cart-preview-cta">View Cart</a>
@else
    <div class="navbar-cart-preview-empty">Your cart is empty</div>
@endif
