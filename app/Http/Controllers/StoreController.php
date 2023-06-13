<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store()
    {
        $stores = Store::get();
        $store_categories = StoreCategory::get();
        return view('store.store', compact('stores', 'store_categories'));
    }
    public function addStore()
    {
        $stores = Store::get();
        $storecategories = StoreCategory::get();
        $cities = City::get();
        return view('store.store_add', compact('stores', 'storecategories', 'cities'));
    }
    public function updateStore(Request $request)
    {
        $store = new Store();
        $store->name = $request->name;
        $store->description = $request->description;
        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/store/'), $filename);
            $store->image = '/store/' . $filename;
        }
        $store->store_category_id = $request->store_category_id;
        $store->rating = $request->rating;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;
        $store->city_id = $request->city_id;
        $store->save();
        return redirect('/view-store');
    }
    public function deleteStore($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->back();
    }
    public function editstore($id)
    {
        $store = Store::find($id);
        $store_categories = StoreCategory::get();
        $cities = City::get();

        return view('store.store_edit', compact('store', 'store_categories','cities'));
    }
    public function storeupdated(Request $request)
    {
        $store = Store::where('id', $request->id)->first();
        $store->name = $request->name;
        $store->description = $request->description;
        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/store/'), $filename);
            $store->image = '/store/' . $filename;
        }
        $store->store_category_id = $request->store_category_id;
        $store->rating = $request->rating;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;
        $store->city_id = $request->city_id;
        $store->save();
        return redirect('/view-store');
    }
}
