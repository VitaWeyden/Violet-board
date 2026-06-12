<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoxCollectLocation;



class BoxCollectController extends Controller
{
    public function showForm()
    {
        $locations = BoxCollectLocation::orderBy('name')->get();
        return view('boxcollect', compact('locations'));
    }


    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'box_id' => 'required|exists:box_collect_locations,id',
        ]);

        return redirect('/platba');
    }
}
