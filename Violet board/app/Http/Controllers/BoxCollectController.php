<?php

namespace App\Http\Controllers;

use App\Models\BoxCollectLocation;



class BoxCollectController extends Controller
{
    public function showForm()
    {
        $locations = BoxCollectLocation::orderBy('name')->get();
        return view('doprava', compact('locations') + ['mode' => 'box']);
    }
}
