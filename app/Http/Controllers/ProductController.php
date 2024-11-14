<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProductBycategory(Request $request)
    {
        $data = Product::where("category_id", $request->id)->with("brand", "category")->get();
        return ResponseHelper::Out("success", $data, 200);
    }
    
    public function ListProductByRemark(Request $request)
    {
        $data = Product::where("remark", $request->remark)->with("brand", "category")->get();
        return ResponseHelper::Out("success", $data, 200);
    }

    public function ListProductByBrand(Request $request)
    {
        $data = Product::where("brand_id", $request->id)->with("brand", "category")->get();
        return ResponseHelper::Out("success", $data, 200);
    }

    public function ListProductSlider(Request $request)
    {
        $data = ProductSlider::all();
        return ResponseHelper::Out("success", $data, 200);
    }

    public function ProductDetailsById(Request $request)
    {
        $data = ProductDetail::where('product_id', $request->id)->with('product', 'product.brand', 'product.category')->get();
        return ResponseHelper::Out("success", $data, 200);
    }

    public function ListReviewByProduct(Request $request)
    {
        $data = ProductReview::where("product_id", $request->id)->with([
            'customer' => function ($query) {
                $query->select('id', 'cus_name');
            }
        ])->get();
        return ResponseHelper::Out("success", $data, 200);
    }
}
