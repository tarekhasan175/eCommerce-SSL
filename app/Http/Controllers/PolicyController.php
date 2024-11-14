<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function PolicyByType()
    {
        return Policy::where('type', request('type'))->first();
    }
}
