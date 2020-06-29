<?php

namespace App\Http\Controllers\Frontend;

use App\Banner;
use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::all();
        return view('frontend.index', compact('banners'));
    }

    public function getByLocation($id)
    {
        $banners = Banner::all()->where('location_id', $id);
        return view('frontend.index', compact('banners'));
    }

    public function show($id){
        $banner = Banner::findOrFail($id);
        return view('frontend.show', compact('banner'));
    }
}
