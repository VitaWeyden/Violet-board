<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DakujemeController extends Controller
{
    public function index(Request $request)
    {
        $source = $request->query('source');

        $message = match($source) {
            'login' => 'Potvrdená akcia!',
            'register' => 'Ďakujeme za registráciu!',
            'registracia' => 'Ďakujeme za registráciu!',
            default => 'Ďakujeme za Váš nákup!',
        };

        return view('dakujeme', ['message' => $message]);
    }
}
