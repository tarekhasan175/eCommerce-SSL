<?php

namespace App\Http\Controllers\Frontend\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("frontend.home.index");
    }
}
