<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function CustomerProfileCreate(Request $request)
    {
        $user_id = $request->header('id');
        $request->merge(['user_id' => $user_id]);
        $data = Customer::updateOrCreate(['user_id' => $user_id], $request->input());

        return ResponseHelper::Out('success', $data, 200);
    }

    public function CustomerProfile(Request $request)
    {
        $user_id = $request->header('id');
        $data = Customer::where('user_id', $user_id)->with('user')->first();

        return ResponseHelper::Out('success', $data, 200);
    }
}
