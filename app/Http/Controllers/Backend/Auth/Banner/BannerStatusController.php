<?php

namespace App\Http\Controllers\Backend\Auth\Banner;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class BannerStatusController extends Controller
{
    public function getAvailable()
    {
        $banners = Banner::all()->filter->currentlyAvailable();
        return view('backend.auth.banner.index', compact('banners'));
    }

    public function getByLocation($id)
    {
        $banners = Banner::all()->where('location_id', $id);
        return view('backend.auth.banner.index', compact('banners'));
    }
}
