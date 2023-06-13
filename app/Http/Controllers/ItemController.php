<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Store;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item()
    {
        $items = Item::get();
        $stores = Store::get();
        $itemCategories = ItemCategory::get();
        return view('item.item', compact('items', 'stores', 'itemCategories'));
    }
    public function additem(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/item/'), $filename);
            $item->image = '/item/' . $filename;
        }
        $item->store_id = $request->store_id;
        $item->item_category_id = $request->item_category_id;
        $item->save();
        return redirect()->back();
    }
    public function toggleItem($id)
    {
        $item = Item::find($id);
        $item->is_active = !$item->is_active;
        $item->save();
        return redirect()->back();
    }
    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function edititem($id)

    {
        $item = Item::find($id);
        $stores = Store::get();
        $itemCategories = ItemCategory::get();
        return view('item.item_edit', compact('item', 'stores', 'itemCategories'));
    }
    public function updateitem(Request $request)
    {
        $item = Item::where('id', $request->id)->first();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        if ($request->image) {
            if ($item->image) {
                @unlink(public_path($item->image));
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/item/'), $imagename);
                $item->image = "/item/" . $imagename;
            } else {
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/item/'), $imagename);
                $item->image = "/item/" . $imagename;
            }
        }
        $item->store_id = $request->store_id;
        $item->item_category_id = $request->item_category_id;
        $item->save();
        return redirect()->back();
    }
}
