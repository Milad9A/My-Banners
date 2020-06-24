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
            'renting_began_at' => 'required|before:renting_ends_at',
            'renting_ends_at' => 'required|after:renting_began_at',
        ]));

        $rent['banner_id'] = $request['banner_id'];

        $rent->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $rent = Rent::findOrFail($id);
        $rent->delete();
        return redirect()->back();
    }
}
