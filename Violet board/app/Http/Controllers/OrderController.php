<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;



class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        }

        session()->forget('cart');

        return redirect()->route('dakujeme', ['source' => 'login']);
    }
}
