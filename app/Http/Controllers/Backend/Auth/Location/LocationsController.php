<?php

namespace App\Http\Controllers\Backend\Auth\Location;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('backend.auth.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location(request()->validate([
            'name' => 'required'
        ]));

        $location->save();

        return redirect()->route('admin.auth.location.index')->withFlashSuccess(__('alerts.backend.locations.created'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('backend.auth.location.edit', compact( 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update(request()->validate([
            'name' => 'required'
        ]));

        return redirect()->route('admin.auth.location.index')->withFlashSuccess(__('alerts.backend.locations.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect(route('admin.auth.location.index'));
    }
}
