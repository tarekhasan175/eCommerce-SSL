<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryList()
    {
        $data = Category::all();
        return ResponseHelper::Out("success", $data, 200);
    }
}
