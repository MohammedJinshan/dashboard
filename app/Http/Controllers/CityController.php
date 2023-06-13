<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function city()
    {
        $cities = City::get();
        return view('city.city',compact('cities'));
    }
    public function addcity(Request $request)
    {
        $city = new City();
        $city->id = $request->id;
        $city->name = $request->name;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;
        $city->is_active = $request->is_active;
        $city->delivery_charge = $request->delivery_charge;
        $city->radius = $request->radius;
        $city->save();
        return redirect()->back();
    }
    public function togglecity($id)
    {
        $city = City::find($id);
        $city->is_active = !$city->is_active;
        $city->save();
        return redirect()->back();
    }
    public function deletecity($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->back();
    }
    public function editcity(Request $request)
    {
        $city = City::where('id',$request->id)->first();
        $city->name = $request->name;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;
        $city->is_active = $request->is_active;
        $city->delivery_charge = $request->delivery_charge;
        $city->radius = $request->radius;
        $city->save();
        return redirect()->back();
    }
}
