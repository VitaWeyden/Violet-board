<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;



class SearchController extends Controller
{
    private function removeAccents($string)
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    }



    public function index(Request $request)
    {
        $query = $request->input('query');
        $normalizedQuery = strtolower($this->removeAccents($query));

        $sort = $request->query('sort', 'asc');

        $productsCollection = Product::with('images')->get()->filter(function ($product) use ($normalizedQuery) {
            $normalizedName = strtolower($this->removeAccents($product->name));

            $effectivePrice = $product->is_discounted && $product->discounted_price
                ? $product->discounted_price
                : $product->price;

            if (!str_contains($normalizedName, $normalizedQuery)) {
                return false;
            }

            $product->effective_price = $effectivePrice;
            return true;
        });

        if ($sort === 'price_asc') {
            $productsCollection = $productsCollection->sortBy('effective_price')->values();
        } elseif ($sort === 'price_desc') {
            $productsCollection = $productsCollection->sortByDesc('effective_price')->values();
        } elseif ($sort === 'desc') {
            $productsCollection = $productsCollection->sortByDesc('name')->values();
        } else {
            $productsCollection = $productsCollection->sortBy('name')->values();
        }

        $perPage = 12;
        $currentPage = $request->input('page', 1);
        $currentItems = $productsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $products = new LengthAwarePaginator(
            $currentItems,
            $productsCollection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $categoryTitle = "Výsledky hľadania pre: \"$query\"";

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle,
            'sort' => $sort,
        ]);
    }
}
