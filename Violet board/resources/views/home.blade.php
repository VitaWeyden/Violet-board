<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violet Board – Board Game Shop</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo-mark.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards-cart-payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel-breadcrumb-badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-controls-modals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar-brand.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-hero-category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar-support-help.css') }}">
</head>

<body class="page-home">
    @include('partials.header')
    @include('partials.sidebar')

    <main class="main-content" id="mainContent">
        @php
            $sectionRoutes = [
                'New Arrivals' => route('shop.new'),
                'Bestsellers'  => route('shop.bestsellers'),
                'On Sale'      => route('shop.on-sale'),
            ];

            // Pick one product for the hero banner — prefer something on
            // sale, then a new arrival, then a bestseller.
            $heroSection = collect(['On Sale', 'New Arrivals', 'Bestsellers'])
                ->first(fn ($section) => $productsBySection[$section]->isNotEmpty());
            $heroProduct = $heroSection ? $productsBySection[$heroSection]->first() : null;
        @endphp

        @php
            $categoryData = include resource_path('views/partials/category-data.php');
            $sidebarCategories = $categoryData['categories'];
            $sidebarIcons = $categoryData['icons'];
            $sidebarIconColors = $categoryData['colors'];
        @endphp

        {{-- Hero: today's pick --}}
        @if ($heroProduct)
            @php
                $heroEffectivePrice = $heroProduct->effectivePrice();
                $heroOriginalPrice  = (float) $heroProduct->price;
                $heroHasDiscount    = $heroEffectivePrice < $heroOriginalPrice;
            @endphp
            <section class="home-hero">
                <div class="home-hero-media">
                    <img src="{{ $heroProduct->images->first()?->url ?? '' }}" alt="{{ $heroProduct->name }}">
                </div>
                <div class="home-hero-content">
                    <span class="home-hero-eyebrow">
                        {{ $heroSection === 'On Sale' ? 'On Sale Right Now' : ($heroSection === 'New Arrivals' ? 'Just Landed' : 'Fan Favorite') }}
                    </span>
                    <h1 class="home-hero-title">{{ $heroProduct->name }}</h1>

                    <div class="home-hero-meta">
                        @if ($heroProduct->bgg_rating)
                            <span class="product-rating">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="m12 2 2.9 6.6L22 9.3l-5.1 4.9 1.4 7.1L12 17.8l-6.3 3.5 1.4-7.1L2 9.3l7.1-.7L12 2z"/></svg>
                                {{ number_format($heroProduct->bgg_rating, 1) }}
                            </span>
                        @endif
                        @if ($heroProduct->min_players && $heroProduct->max_players)
                            <span class="home-hero-meta-item">{{ $heroProduct->min_players }}–{{ $heroProduct->max_players }} players</span>
                        @endif
                        @if ($heroProduct->play_time_min)
                            <span class="home-hero-meta-item">{{ $heroProduct->play_time_min }}{{ $heroProduct->play_time_max ? '–'.$heroProduct->play_time_max : '' }} min</span>
                        @endif
                    </div>

                    @if ($heroProduct->description)
                        <p class="home-hero-desc">{{ \Illuminate\Support\Str::limit($heroProduct->description, 140) }}</p>
                    @endif

                    <div class="home-hero-cta-row">
                        <span class="home-hero-price">
                            @if ($heroHasDiscount)
                                <span class="home-hero-price-old">{{ number_format($heroOriginalPrice, 2) }} €</span>
                            @endif
                            {{ number_format($heroEffectivePrice, 2) }} €
                        </span>
                        <a href="{{ route('product.show', ['id' => $heroProduct->id]) }}?from_label={{ urlencode($heroSection) }}&from_url={{ urlencode($sectionRoutes[$heroSection] ?? url('/shop')) }}" class="btn btn-primary px-4">
                            View Game
                        </a>
                    </div>
                </div>
            </section>
        @endif

        {{-- Shop by category --}}
        <section class="category-rail-section">
            <h3 class="carousel-header">Shop by Category</h3>
            <div class="category-rail">
                @foreach ($sidebarCategories as $slug => $label)
                    <a href="{{ url('/shop/' . $slug) }}" class="category-tile">
                        <span class="category-tile-icon" style="background:{{ $sidebarIconColors[$slug] }}1A; color:{{ $sidebarIconColors[$slug] }};">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">{!! $sidebarIcons[$slug] !!}</svg>
                        </span>
                        <span class="category-tile-label">{{ $label }}</span>
                    </a>
                @endforeach
            </div>
        </section>

        @foreach ($sections as $section)
            @if ($productsBySection[$section]->isNotEmpty())
            <div class="carousel-section">
                <h3 class="carousel-header">{{ $section }}</h3>

                <div class="carousel-wrapper">
                    <div class="carousel-view">
                        <div class="carousel-content">
                            @foreach ($productsBySection[$section] as $product)
                                @php
                                    $cardEffectivePrice = $product->effectivePrice();
                                    $cardOriginalPrice  = (float) $product->price;
                                    $cardHasDiscount    = $cardEffectivePrice < $cardOriginalPrice;
                                @endphp
                                <a href="{{ route('product.show', ['id' => $product->id]) }}?from_label={{ urlencode($section) }}&from_url={{ urlencode($sectionRoutes[$section] ?? url('/shop')) }}"
                                   class="product-card text-decoration-none text-dark">
                                    <div class="product-image">
                                        <img src="{{ $product->images->first()?->url ?? '' }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="product-card-footer">
                                        @if ($product->bgg_rating)
                                            <span class="product-rating">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="m12 2 2.9 6.6L22 9.3l-5.1 4.9 1.4 7.1L12 17.8l-6.3 3.5 1.4-7.1L2 9.3l7.1-.7L12 2z"/></svg>
                                                {{ number_format($product->bgg_rating, 1) }}
                                            </span>
                                        @else
                                            <span></span>
                                        @endif
                                        <span class="product-price {{ $cardHasDiscount ? 'product-price--sale' : '' }}">
                                            {{ number_format($cardEffectivePrice, 2) }} €
                                        </span>
                                    </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/home-carousel.js') }}"></script>
    <script src="{{ asset('js/sidebar-toggle.js') }}"></script>
</body>
</html>
