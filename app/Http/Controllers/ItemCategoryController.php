<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function itemcategory()
    {
        $itemcategories = ItemCategory::get();
        return view('item category.item_category', compact('itemcategories'));
    }
    public function additemCategory(Request $request)
    {
        $itemcategorie = new ItemCategory();
        $itemcategorie->name = $request->name;
        $itemcategorie->save();
        return redirect()->back();

    }
}
