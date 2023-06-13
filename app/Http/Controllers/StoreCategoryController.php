<?php

namespace App\Http\Controllers;

use App\Models\StoreCategory;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    public function store_category()
    {
        $store_categories = StoreCategory::get();
        return view('store category.store_category', compact('store_categories'));
    }
    public function addStorecategory(Request $request)
    {
        $storeCategory = new StoreCategory();
        $storeCategory->name = $request->name;

        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/storeCategory/'), $filename);
            $storeCategory->image = '/storeCategory/' . $filename;
        }
        $storeCategory->save();
        return redirect()->back();
    }
    public function toggleStorecategory($id)
    {
        $storeCategory = StoreCategory::find($id);
        $storeCategory->is_active = !$storeCategory->is_active;
        $storeCategory->save();
        return redirect()->back();
    }

    public function editStorecategory(Request $request)
    {
        $storeCategory = StoreCategory::where('id', $request->id)->first();
        $storeCategory->name = $request->name;
        if ($request->image) {
            if ($storeCategory->image) {
                @unlink(public_path($storeCategory->image));
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/storeCategory/'), $imagename);
                $storeCategory->image = "/storeCategory/" . $imagename;
            } else {
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $$file->move(public_path('/storeCategory/'), $imagename);
                $storeCategory->image = "/storeCategory/" . $imagename;
            }
        }
        $storeCategory->save();
        return redirect()->back();
    }

    public function deletestorecategory($id)
    {
        $storeCategory = StoreCategory::find($id);
        $storeCategory->delete();
        return redirect()->back();
    }
}
