<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use DataTables;

class DatatableController extends Controller
{
    public function cityDatatable()
    {

        $cities = City::get();
        return Datatables::of($cities)->addIndexColumn()

            ->addColumn('name', function ($city) {
                return $city->name;
            })
            ->addColumn('latitude', function ($city) {
                return $city->latitude;
            })
            ->addColumn('longitude', function ($city) {
                return $city->longitude;
            })
            ->addColumn('is_active', function ($city) {
                if ($city->is_active) {

                    $stat = '<a href="' . route('city.toggle', $city->id) . '" class="btn btn-success"><i class="bi bi-power"></i></a>';
                } else {
                    $stat = '<a href="' . route('city.toggle', $city->id) . '" class="btn btn-danger"><i class="bi bi-power"></i></a>';
                }
                return $stat;
            })
            ->addColumn('delivery_charge', function ($city) {
                return $city->delivery_charge;
            })
            ->addColumn('radius', function ($city) {
                return $city->radius;
            })
            ->addColumn('action', function ($city) {
                $btn = '<button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal" data-bs-target="#deletecity' . $city->id . '"><i class="bi bi-trash-fill"></i></button>
                <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcity' . $city->id . '"><i class="bi bi-pencil-square"></i></button>';

                return $btn;
            })
            ->rawColumns(['name', 'latitude', 'longitude', 'is_active', 'delivery_charge', 'radius', 'action'])
            ->make(true);
    }
    public function storecategoryDatatable()
    {
        $storecategory = StoreCategory::get();
        return Datatables::of($storecategory)->addIndexColumn()

            ->addColumn('name', function ($storecategory) {
                return $storecategory->name;
            })
            ->addColumn('is_active', function ($storecategory) {
                if ($storecategory->is_active) {

                    $stat = '<a href="' . route('Storestorecategory.toggle', $storecategory->id) . '" class="btn btn-success"><i class="bi bi-power"></i></a>';
                } else {
                    $stat = '<a href="' . route('Storestorecategory.toggle', $storecategory->id) . '" class="btn btn-danger"><i class="bi bi-power"></i></a>';
                }
                return $stat;
            })
            ->addColumn('image', function ($storecategory) {
                $image = '<image src="' . asset($storecategory->image) . '" style="hieght: 100px; width: 100px;"></image>';
                return $image;
            })
            ->addColumn('action', function ($storecategory) {
                $atn = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#storecategorydelete' . $storecategory->id . '"><i class="bi bi-trash"></i></button>
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storecategory' . $storecategory->id . '"><i class="bi bi-pencil-square"></i></button>';
                return $atn;
            })
            ->rawColumns(['name', 'is_active', 'image', 'action'])
            ->make(true);
    }

    public function storeDatatable()
    {
        $stores = Store::with('store_category', 'city');
        return Datatables::of($stores)
            // ->addIndexColumn()
            // ->addColumn('id', function ($store) {
            //     if ($store->id) {
            //         return $store->id;
            //     } else {
            //         return "sssss";
            //     }
            // })
            // ->addColumn('name', function ($store) {
            //     if ($store->name) {
            //         return $store->name;
            //     } else {
            //         return "sssss";
            //     }
            // })
            // ->addColumn('description', function ($store) {
            //     return $store->description;
            // })
            ->editColumn('image', function ($store) {
                $image = '<image src="' . asset($store->image) . '" style="hieght: 100px; width: 100px;"></image>';
                return $image;
            })
            // ->addColumn('store_category_id', function ($store) {
            //     return $store->storecategory->name ?? 'NONE';
            // })
            // ->addColumn('rating', function ($store) {
            //     return $store->rating;
            // })
            // ->addColumn('latitude', function ($store) {
            //     return $store->latitude;
            // })
            // ->addColumn('longitude', function ($store) {
            //     return $store->longitude;
            // })
            ->addColumn('city_id', function ($store) {
                if ($store->city) {
                    return $store->city;
                } else {
                    return "no city found";
                }
            })
            ->addColumn('action', function ($store) {
                $atn = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#storedelete' . $store->id . '"><i class="bi bi-trash"></i></button>
                <a type="button" class="btn btn-primary" href="' . route('store.edit', $store->id) . '"><i class="bi bi-pencil-square"></i></a>';
                return $atn;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
    public function itemDatatable()
    {
        $items = Item::with('store');
        return Datatables::of($items)
            ->editColumn('image', function ($item) {
                $image = '<image src="' . asset($item->image) . '" style="hieght: 100px; width: 100px;"></image>';
                return $image;
            })
            ->addColumn('store_id', function ($item) {
                if ($item->store) {
                    return $item->store->name;
                } else {
                    return "no store found";
                }
            })
            ->addColumn('is_active', function ($item) {
                if ($item->is_active) {
                    $html = '<a href="' . route('Item.toggle', $item->id) . '" class="btn btn-danger"><i class="bi bi-power"></i></a>';
                } else {
                    $html = '<a href="' . route('Item.toggle', $item->id) . '" class="btn btn-success"><i class="bi bi-power"></i></a>';
                }
                return $html;
            })
            ->addColumn('action', function ($item) {
                $atn = '
                <div class="btn-group" role="group">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteitem' . $item->id . '"><i class="bi bi-trash"></i></button>
                <a type="button" class="btn btn-primary" href="' . route('item.edit', $item->id) . '"><i class="bi bi-pencil-square"></i></a>
                </div>';

                return $atn;
            })
            ->addColumn('item_category_id', function ($item) {
                if ($item->item_category) {
                    return $item->item_category->name;
                } else {
                    return "no store found";
                }
            })
            ->rawColumns(['image', 'is_active', 'action', 'store_id', 'item_category_id'])
            ->make(true);
    }
    public function itemcategorieDatatable()
    {
        $itemcategory = ItemCategory::get();
        return Datatables::of($itemcategory)->addIndexColumn()
        ->addColumn('id', function ($itemcategory) {
            return $itemcategory->id;
        })
        ->addColumn('name', function ($itemcategory) {
            return $itemcategory->name;
        })
            ->addColumn('action', function ($itemcategory) {
                $atn = '
                <div class="btn-group" role="group">
                <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                <a type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                </div>';

                return $atn;
            })
            ->rawColumns(['id','name','action'])
            ->make(true);
    }
}
