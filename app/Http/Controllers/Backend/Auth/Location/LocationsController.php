<?php

namespace App\Http\Controllers\Backend\Auth\Location;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('backend.auth.location.index', compact('locations'));
    }
}
