<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupApiController extends Controller
{
    public function signup(Request $request)
    {
        if ($request->name&&$request->email) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_number = $request->phone;
            $user->save();
            $response = [
                'success' => true,
                'user' => $user
            ];
        } else {
            $response = [
                'sucess' => false,
                'data' => "data not Found"
            ];
        }
        return response()->json($response);
    }
}
