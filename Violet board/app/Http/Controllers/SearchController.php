<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query           = $request->input('query', '');
        $normalizedQuery = strtolower($this->removeAccents($query));
        $sort            = $request->query('sort', 'asc');

        $products = Product::with(['images', 'discount'])->get()
            ->filter(function ($product) use ($normalizedQuery) {
                return str_contains(
                    strtolower($this->removeAccents($product->name)),
                    $normalizedQuery
                );
            })
            ->map(function ($product) {
                $product->effective_price = $product->effectivePrice();
                return $product;
            });

        $products = match ($sort) {
            'price_asc'  => $products->sortBy('effective_price')->values(),
            'price_desc' => $products->sortByDesc('effective_price')->values(),
            'name_desc'  => $products->sortByDesc('name')->values(),
            default      => $products->sortBy('name')->values(),
        };

        $perPage  = 42;
        $page     = $request->input('page', 1);
        $paginated = new LengthAwarePaginator(
            $products->slice(($page - 1) * $perPage, $perPage)->values(),
            $products->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('shop', [
            'products'      => $paginated,
            'categoryTitle' => "Search results for: \"{$query}\"",
            'sort'          => $sort,
        ]);
    }

    public function suggest(Request $request)
    {
        $query = trim($request->input('query', ''));

        if ($query === '') {
            return response()->json([]);
        }

        $normalized = strtolower($this->removeAccents($query));

        $results = Product::with('images')->get()
            ->filter(fn($p) => str_contains(
                strtolower($this->removeAccents($p->name)),
                $normalized
            ))
            ->take(8)
            ->map(function ($product) {
                $image = $product->images->first();

                return [
                    'id'    => $product->id,
                    'name'  => $product->name,
                    'price' => number_format($product->effectivePrice(), 2),
                    'image' => $image?->url,
                    'url'   => route('product.show', $product->id),
                ];
            })
            ->values();

        return response()->json($results);
    }

    private function removeAccents(string $string): string
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $string) ?: $string;
    }
}
