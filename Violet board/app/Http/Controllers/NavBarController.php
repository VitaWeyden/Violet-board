<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class NavBarController extends Controller
{
    public function showOnSale(Request $request)
    {
        $sort     = $request->query('sort', 'default');
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $maxAge   = $request->query('max_age');
        $players  = $request->query('players');

        $query = Product::with(['images', 'discount'])
            ->whereNotNull('discount_id')
            ->whereHas('discount', fn($q) => $q->whereRaw(
                "(starts_at IS NULL OR starts_at <= NOW()) AND (ends_at IS NULL OR ends_at >= NOW())"
            ));

        $this->applyFilters($query, $maxAge, $players);

        $products = $this->sortAndPaginate($query, $sort, $minPrice, $maxPrice, $request);

        return view('shop', [
            'products'      => $products,
            'categoryTitle' => 'On Sale',
            'sort'          => $sort,
            'max_age'       => $maxAge,
            'players'       => $players,
        ]);
    }

    public function showNew(Request $request)
    {
        $sort     = $request->query('sort', 'default');
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $maxAge   = $request->query('max_age');
        $players  = $request->query('players');

        $query = Product::with(['images', 'label'])
            ->whereHas('label', fn($q) => $q->where('name', 'New'));

        $this->applyFilters($query, $maxAge, $players);

        $products = $this->sortAndPaginate($query, $sort, $minPrice, $maxPrice, $request);

        return view('shop', [
            'products'      => $products,
            'categoryTitle' => 'New Arrivals',
            'sort'          => $sort,
            'max_age'       => $maxAge,
            'players'       => $players,
        ]);
    }

    public function showBestSellers(Request $request)
    {
        $sort     = $request->query('sort', 'default');
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $maxAge   = $request->query('max_age');
        $players  = $request->query('players');

        $query = Product::with(['images', 'label'])
            ->whereHas('label', fn($q) => $q->where('name', 'Bestseller'));

        $this->applyFilters($query, $maxAge, $players);

        $products = $this->sortAndPaginate($query, $sort, $minPrice, $maxPrice, $request);

        return view('shop', [
            'products'      => $products,
            'categoryTitle' => 'Bestsellers',
            'sort'          => $sort,
            'max_age'       => $maxAge,
            'players'       => $players,
        ]);
    }

    public function showFavorites(Request $request)
    {
        $sort     = $request->query('sort', 'default');
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $maxAge   = $request->query('max_age');
        $players  = $request->query('players');

        if (auth()->check()) {
            $query = auth()->user()->favorites()->with(['images', 'discount']);
        } else {
            $guestIds = session()->get('guest_favorites', []);
            $query    = \App\Models\Product::with(['images', 'discount'])
                ->whereIn('id', empty($guestIds) ? [0] : $guestIds);
        }

        $this->applyFilters($query, $maxAge, $players);

        $products = $this->sortAndPaginate($query, $sort, $minPrice, $maxPrice, $request);

        return view('shop', [
            'products'      => $products,
            'categoryTitle' => 'Your Favorites',
            'sort'          => $sort,
            'max_age'       => $maxAge,
            'players'       => $players,
        ]);
    }

    private function applyFilters($query, ?string $maxAge, ?string $players): void
    {
        if (!is_null($maxAge)) {
            $query->where('min_age', '<=', $maxAge);
        }

        if (!is_null($players)) {
            $query->where('max_players', '>=', $players);
        }
    }

    private function sortAndPaginate($query, string $sort, $minPrice, $maxPrice, Request $request)
    {
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        if (!is_null($minPrice) || !is_null($maxPrice)) {
            $all = $query->get()->filter(function ($product) use ($minPrice, $maxPrice) {
                $price = $product->effectivePrice();
                if ($minPrice !== null && $price < $minPrice) return false;
                if ($maxPrice !== null && $price > $maxPrice) return false;
                return true;
            });

            $perPage  = 30;
            $page     = request()->input('page', 1);
            $paged    = $all->slice(($page - 1) * $perPage, $perPage)->values();

            return new \Illuminate\Pagination\LengthAwarePaginator(
                $paged, $all->count(), $perPage, $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        return $query->paginate(30)->appends($request->query());
    }
}
