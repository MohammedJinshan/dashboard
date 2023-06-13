<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;

class OtpApiController extends Controller
{
    public function getopt(Request $request)
    {
        if ($request->phone) {
            $otp = new Otp();
            $otp->phone = $request->phone;
            $otpRandomDigit = rand(1000, 9999);
            $otp->otp = $otpRandomDigit;
            $otp->save();
            $response = [
                'success' => true,
                'otp' => $otp,
            ];
        } else {
            $response = [
                'sucess' => false,
                'data' => "data not found"
            ];
        }
        return response()->json($response);
    }
    public function confrmotp(Request $request)
    {
        $otp = Otp::where('phone', $request->phone)->where('otp', $request->otp)->first();
        if ($otp) {
            $user = User::where('mobile_number', $request->phone)->first();
            if ($user) {
                $response = [
                    'success' => true,
                    'otp' => $otp,
                    'user' => $user
                ];
            } else {
                $response = [
                    'success' => true,
                    'otp' => $otp,
                ];
            }
        } else {
            $response = [
                'sucess' => false,
                'data' => "data not found"
            ];
        }
        return response()->json($response);
    }
}
