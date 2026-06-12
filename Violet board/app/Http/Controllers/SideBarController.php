<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;



class SideBarController extends Controller
{
    public function showCategory(Request $request, $categorySlug)
    {
        $categories = [
            'strategia' => 'Štrategické hry',
            'puzzle' => 'Puzzle',
            'party' => 'Party hry',
            'vedomostne' => 'Vedomostné hry',
            'karty' => 'Kartové hry',
            'rodinne' => 'Rodinné hry',
            'deti' => 'Pre deti',
            'pamat' => 'Pamäťové hry'
        ];

        $categoryTitle = $categories[$categorySlug] ?? 'Neznáma kategória';
        $category = Category::where('slug', $categorySlug)->first();

        if (!$category) {
            abort(404);
        }

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->input('sort', 'default');
        $maxAge = $request->input('vekova_kategoria');
        $players = $request->input('hracov');

        $productsQuery = $category->products()->with(['images' => fn($query) => $query->orderBy('filename')]);

        if (!is_null($minPrice)) {
            $productsQuery->whereRaw('(CASE WHEN discounted_price IS NOT NULL THEN discounted_price ELSE price END) >= ?', [$minPrice]);
        }

        if (!is_null($maxPrice)) {
            $productsQuery->whereRaw('(CASE WHEN discounted_price IS NOT NULL THEN discounted_price ELSE price END) <= ?', [$maxPrice]);
        }

        if (!is_null($maxAge)) {
            $productsQuery->where('min_age', '<=', $maxAge);
        }

        if (!is_null($players)) {
            $productsQuery->where('max_players', '>=', $players);
        }

        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderByRaw('(CASE WHEN discounted_price IS NOT NULL THEN discounted_price ELSE price END) ASC');
                break;
            case 'price_desc':
                $productsQuery->orderByRaw('(CASE WHEN discounted_price IS NOT NULL THEN discounted_price ELSE price END) DESC');
                break;
            case 'asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            default:
                $productsQuery->orderBy('name', 'asc');
                break;
        }

        $products = $productsQuery->paginate(12)->appends($request->query());

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle,
            'categorySlug' => $categorySlug,
            'sort' => $sort,
            'vekova_kategoria' => $maxAge,
            'hracov' => $players,
        ]);
    }
}
