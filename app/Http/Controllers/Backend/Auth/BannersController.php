<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Location;
use App\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.auth.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('backend.auth.banner.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner(request()->validate([
            'number' => ['required', 'numeric', Rule::unique('banners')->where(function ($query) use ($request) {
                return $query->where('location_id', $request->location_id);
            })],
            'description' => 'required',
            'location_id' => 'required|exists:locations,id',
            'image' => 'required',
        ]));

        if ($image = $request->file('image')) {
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $filepath = $request->file('image')->storeAs('banners', $imageName, 'public');
            $banner['image'] = $filepath;
        }
        $banner->save();

        $rent = new Rent(request()->validate([
            'customer_name' => 'required',
            'renting_began_at' => 'required',
            'renting_ends_at' => 'required',
        ]));

        $rent['banner_id'] = $banner->id;
        $rent->save();

        return redirect()->route('admin.auth.banner.index')->withFlashSuccess(__('alerts.backend.banners.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.auth.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $locations = Location::all();
        return view('backend.auth.banner.edit', compact('banner', 'locations'));
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
        $banner = Banner::findOrFail($id);
        $banner->update(request()->validate([
            'number' => ['numeric', 'required', Rule::unique('banners')->where(function ($query) use ($request) {
                return $query->where('location_id', $request->location_id);
            })->ignore($banner)],
            'description' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]));

        if ($image = $request->file('image')) {
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $filepath = $request->file('image')->storeAs('banners', $imageName, 'public');
            $banner['image'] = $filepath;
            $banner->update([
                'image' => $filepath,
            ]);
        }

        if ($request->active){
            $banner->update([
               'active' => 1
            ]);
        } else {
            $banner->update([
                'active' => 0
            ]);
        }

        if($request->customer_name){
            $banner->rents->last()->update([
               'customer_name' => $request['customer_name'],
            ]);
        }

        if ($request->renting_began_at) {
            $banner->rents->last()->update([
                'renting_began_at' => $request['renting_began_at'],
            ]);
        }

        if ($request->renting_ends_at) {
            $banner->rents->last()->update([
                'renting_ends_at' => $request['renting_ends_at'],
            ]);
        }

        return redirect()->route('admin.auth.banner.index')->withFlashSuccess(__('alerts.backend.banners.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        File::delete((public_path($banner->image)));
        $banner->delete();
        return redirect(route('admin.auth.banner.index'));
    }
}
