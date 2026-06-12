<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name . ' ' . $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('dakujeme', ['source' => 'registracia']);
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $sessionCart = session()->get('cart', []);
            $dbCart = \App\Models\Cart::where('user_id', $user->id)->first();

            if ($dbCart) {
                $dbItems = json_decode($dbCart->items, true);

                foreach ($sessionCart as $productId => $item) {
                    if (isset($dbItems[$productId])) {
                        $dbItems[$productId]['quantity'] += $item['quantity'];
                    } else {
                        $dbItems[$productId] = $item;
                    }
                }

            } else {
                $dbItems = $sessionCart;
            }

            \App\Models\Cart::updateOrCreate(
                ['user_id' => $user->id],
                ['items' => json_encode($dbItems)]
            );

            session(['cart' => $dbItems]);

            return redirect()->route('dakujeme', ['source' => 'login']);
        }

        return back()->withErrors([
            'email' => 'Nesprávny email alebo heslo.',
        ]);
    }



    public function destroy(Request $request)
    {
        $user = auth()->user();

        auth()->logout();

        \DB::table('sessions')->where('user_id', $user->id)->delete();

        $user->delete();

        return redirect('/')->with('success', 'Váš účet bol úspešne vymazaný.');
    }



    public function logout()
    {
        session()->forget('cart');

        Auth::logout();
        return redirect('/');
    }

}
