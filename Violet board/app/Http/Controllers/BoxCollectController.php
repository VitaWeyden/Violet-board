<?php

namespace App\Http\Controllers;

use App\Models\BoxCollectLocation;



class BoxCollectController extends Controller
{
    public function showForm()
    {
        $locations = collect(config('box_collect_locations'))->sortBy('name');
        return view('doprava', compact('locations') + ['mode' => 'box']);
    }
}
