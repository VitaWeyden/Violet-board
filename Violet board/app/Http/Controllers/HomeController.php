<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $newLabel         = Label::where('name', 'New')->first();
        $bestsellerLabel  = Label::where('name', 'Bestseller')->first();

        $sections = ['New Arrivals', 'Bestsellers', 'On Sale'];

        $productsBySection = [
            'New Arrivals' => $newLabel
                ? Product::where('label_id', $newLabel->id)
                    ->where('in_stock', true)
                    ->with('images')
                    ->latest()
                    ->take(12)
                    ->get()
                : collect(),

            'Bestsellers' => $bestsellerLabel
                ? Product::where('label_id', $bestsellerLabel->id)
                    ->where('in_stock', true)
                    ->with('images')
                    ->take(12)
                    ->get()
                : collect(),

            'On Sale' => Product::whereNotNull('discount_id')
                ->where('in_stock', true)
                ->whereHas('discount', function ($query) {
                    $query
                        ->where(function ($q) {
                            $q->whereNull('starts_at')
                              ->orWhere('starts_at', '<=', now());
                        })
                        ->where(function ($q) {
                            $q->whereNull('ends_at')
                              ->orWhere('ends_at', '>=', now());
                        });
                })
                ->with(['images', 'discount'])
                ->take(12)
                ->get(),
        ];

        return view('home', compact('sections', 'productsBySection'));
    }
}
