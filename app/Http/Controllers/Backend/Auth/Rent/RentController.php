<?php

namespace App\Http\Controllers\Backend\Auth\Rent;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function store(Request $request){
        $rent = new Rent(request()->validate([
            'customer_name' => 'required',
            'renting_began_at' => 'required',
            'renting_ends_at' => 'required',
        ]));

        $rent['banner_id'] = 1;

        $rent->save();

        $banner = Banner::findOrFail(1);

        return redirect()->route('admin.auth.banner.show', compact('banner'));
    }
}
