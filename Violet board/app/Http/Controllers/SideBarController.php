<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SideBarController extends Controller
{
    public function showCategory(Request $request, string $slug)
    {
        // Match slug against slugified English category names
        // e.g. "strategy-games" matches "Strategy Games"
        $category = Category::all()->first(
            fn($cat) => Str::slug($cat->name) === $slug
        );

        abort_if(!$category, 404);

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort     = $request->input('sort', 'default');
        $maxAge   = $request->input('max_age');
        $players  = $request->input('players');

        $query = $category->products()
            ->with(['images', 'discount']);

        if (!is_null($maxAge)) {
            $query->where('min_age', '<=', $maxAge);
        }

        if (!is_null($players)) {
            $query->where('max_players', '>=', $players);
        }

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
            $page     = $request->input('page', 1);
            $products = new \Illuminate\Pagination\LengthAwarePaginator(
                $all->slice(($page - 1) * $perPage, $perPage)->values(),
                $all->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            $products = $query->paginate(30)->appends($request->query());
        }

        return view('shop', [
            'products'      => $products,
            'categoryTitle' => $category->name,
            'categorySlug'  => $slug,
            'sort'          => $sort,
            'max_age'       => $maxAge,
            'players'       => $players,
        ]);
    }
}
