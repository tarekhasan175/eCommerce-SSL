<?php

namespace App\Helpers;

use App\Models\Invoice;
use App\Models\SSLCommerceAccount;
use Illuminate\Support\Facades\Http;

class SSLCommerce
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    Public static function IntiatePayment($profile, $payable, $tran_id, $user_email)
    {
        try {
            $ssl = SSLCommerceAccount::first();

            $response = Http::asForm()->post($ssl->init_url, [
                "store_id" => $ssl->store_id,
                "store_password" => $ssl->store_password,
                "total_amount" => $payable,
                "currency" => $ssl->currency,
                "tran_id" => $tran_id,
                "success_url" => "$ssl->success_url?tran_id = $tran_id",
                "fail_url" => "$ssl->fail_url?tran_id = $tran_id",
                "cancel_url" => "$ssl->cancel_url?tran_id = $tran_id",
                "ipn_url" => $ssl->ipn_url,
                "cus_name" => $profile->cus_name,
                "cus_email" => $profile->cus_email,
                "cus_add1" => $profile->cus_add1,
                "cus_add2" => $profile->cus_add2,
                "cus_city" => $profile->cus_city,
                "cus_state" => $profile->cus_state,
                "cus_postcode" => $profile->cus_postcode,
                "cus_country" => $profile->cus_country,
                "cus_phone" => $profile->cus_phone,
                "cus_fax" => $profile->cus_fax,
                "shipping_method" => "YES",
                "ship_name" => $profile->ship_name,
                "ship_add1" => $profile->ship_add1,
                "ship_add2" => $profile->ship_add2,
                "ship_city" => $profile->ship_city,
                "ship_state" => $profile->ship_state,
                "ship_postcode" => $profile->ship_postcode,
                "ship_country" => $profile->ship_country,
                "product_name" => "Demo Product",
                "product_category" => "Demo Category",
                "product_profile" => "Demo Profile",
                "product_amount" => $payable,
            ]);

            return $response->json('success');
        
        } catch (\Exception $e) {
            return $ssl;
        }
    }

    public static function IntiateSuccess($tran_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => 'Success']);

        return true;
    }

    public static function IntiateFail($tran_id)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => 'Failed']);

        return true;
    }

    public static function IntiateCancel($tran_id)
    {
        Invoice::where(['tran_id'=> $tran_id, 'val_id' => 0])->update(['payment_status' => 'Cancel']);

        return true;
    }

    public static function IntiateIPN($tran_id, $val_id, $status)
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payment_status' => $status, 'val_id'=> $val_id]);

        return true;
    }
}
