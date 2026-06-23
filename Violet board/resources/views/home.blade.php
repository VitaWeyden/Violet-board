<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violet Board – Board Game Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>

<body>
    @include('partials.header')
    @include('partials.sidebar')

    <main class="main-content" id="mainContent">
        @php
            $sectionRoutes = [
                'New Arrivals' => route('shop.new'),
                'Bestsellers'  => route('shop.bestsellers'),
                'On Sale'      => route('shop.on-sale'),
            ];
        @endphp

        @foreach ($sections as $section)
            @if ($productsBySection[$section]->isNotEmpty())
            <div class="carousel-section">
                <h3 class="carousel-header">{{ $section }}</h3>

                <div class="carousel-wrapper">
                    <div class="carousel-view">
                        <div class="carousel-content">
                            @foreach ($productsBySection[$section] as $product)
                                <a href="{{ route('product.show', ['id' => $product->id]) }}?from_label={{ urlencode($section) }}&from_url={{ urlencode($sectionRoutes[$section] ?? url('/shop')) }}"
                                   class="product-card text-decoration-none text-dark">
                                    <div class="product-image">
                                        <img src="{{ $product->images->first()?->url ?? '' }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-name">{{ $product->name }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="arrow-container">
                    <button class="arrow-section arrow left">&#9664;</button>
                    <button class="arrow-section arrow right">&#9654;</button>
                </div>
            </div>
            @endif
        @endforeach
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/home-carousel.js') }}"></script>
    <script src="{{ asset('js/sidebar-toggle.js') }}"></script>
</body>
</html>
