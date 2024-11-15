<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use App\Models\ProductWish;
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

    public function ProductReviewCreate(Request $request)
    {
        $user_id = $request->header('id');
        $profile = Customer::where('user_id', $user_id)->first();

        if ($profile) {
            $request->merge(['customer_id' => $profile->id]);
            $data = ProductReview::updateOrCreate(
                [
                    'customer_id' => $profile->id,
                    'product_id' => $request->input('product_id'),

                ], $request->input() 
            );
            return ResponseHelper::Out("success", $data, 200);
        } else {
            return ResponseHelper::Out("fail", "Customer not found", 404);
        }
    }

    public function ProductWishList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductWish::where('user_id', $user_id)->with('product')->get();

        return ResponseHelper::Out("success", $data, 200);
    }

    public function CreateWishList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductWish::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $request->product_id],
            ['user_id' => $user_id, 'product_id' => $request->product_id]
        );

        return ResponseHelper::Out("success", $data, 200);
    }

    public function RemoveWishList(Request $request)
    {
        $user_id = $request->header('id');
        $data = ProductWish::where('user_id', $user_id, 'product_id', $request->product_id)->delete();

        return ResponseHelper::Out("success", $data, 200);
    }

    public function CreateCart(Request $request)
    {
        $user_id = $request->header("id");
        $product_id = $request->input("product_id");
        $color = $request->input("color");
        $size = $request->input("size");
        $qty = $request->input("qty");
        $unit_price = 0;

        $productDetails = Product::where('id', $product_id)->first();
        
        if ($productDetails->discount_price == 0) {
            $price = $productDetails->discount_price;
        } else {
            $unit_price = $productDetails->price;
        }

        $totalPrice = $qty * $unit_price;

        $data = ProductCart::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            [
                'user_id'=> $user_id,
                'product_id' => $product_id,
                'color' => $color,
                'size'=> $size,
                'qty' => $qty,
                'price' => $totalPrice,
            ]
        );
        
        return ResponseHelper::Out("success", $data, 200);
    }

    public function Cartlist(Request $request)
    {
        $user_id = $request->header("id");
        $data = ProductCart::where('user_id', $user_id)->with('product')->get();

        return ResponseHelper::Out("success", $data, 200);
    }

    public function RemoveCart(Request $request)
    {
        $user_id = $request->header("id");
        $data = ProductCart::where('user_id', $user_id)->where('product_id', $request->product_id)->delete();

        return ResponseHelper::Out("success", $data, 200);
    }
}
