<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected Guard $guard = "id";

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
