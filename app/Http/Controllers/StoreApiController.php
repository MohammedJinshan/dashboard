<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreApiController extends Controller
{
    public function allstores()
    {
        $stores = Store::get();
        $response = [
            'sucess' => true,
            'data' => $stores
        ];
        return response()->json($response);
    }
    public function allrestores()
    {
        $stores = Store::whereIn('store_category_id',[4,2])->get();
        $response = [
            'sucess' => true,
            'data' => $stores
        ];
        return response()->json($response);
    }
}
