<?php

namespace App\Http\Controllers;

class BoxCollectController extends Controller
{
    public function showForm()
    {
        $locations = collect(config('box_collect_locations'))->sortBy('name');

        return view('transport', compact('locations') + ['mode' => 'box']);
    }
}
