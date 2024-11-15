<?php

namespace App\Http\Controllers;

use App\Helpers\JWTToken;
use App\Helpers\ResponseHelper;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function UserLogin(Request $request)
    {
        try {
            $userEmail = $request->userEmail;
            $otp = rand(100000,999999);
            $details = ['code' => $otp];

            Mail::to($userEmail)->send(new OtpMail($details));

            User::updateOrCreate(
                [
                    'email' => $userEmail
                ],
                [
                    'email' => $userEmail,
                    'otp' => $otp
                ]);

            return ResponseHelper::Out('success', "A 6 digit OTP has been sent to your email", 200);

        } catch (\Exception $e) {
            return ResponseHelper::Out('fail', $e, 200);
        }
    }
    
    public function UserVerify(Request $request)
    {
        $userEmail = $request->userEmail;
        $otp = $request->otp;

        $verification = User::where('email', $userEmail)->where('otp', $otp)->first();

        if ($verification) {
            User::where('email', $userEmail)->where('otp', $otp)->update(['otp' => '0']);
            $token = JWTToken::createToken($userEmail, $verification->id);
            return ResponseHelper::Out('success', "User verified successfully", 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail', "OTP is not valid", 401);
        }
    }

    public function UserLogout()
    {
        return redirect()->route('user.login')->cookie('token', '', -1);
    }
}
