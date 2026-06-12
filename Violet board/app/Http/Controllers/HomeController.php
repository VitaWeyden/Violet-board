<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $productsBySection = [
            'Akcie' => Product::where('is_discounted', true)->get(),
            'Novinky' => Product::where('is_new', true)->get(),
            'Best sellers' => Product::where('is_best_seller', true)->get(),
        ];

        return view('home', [
            'sections' => array_keys($productsBySection),
            'productsBySection' => $productsBySection,
        ]);
    }
}
