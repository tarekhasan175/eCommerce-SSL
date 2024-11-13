<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected Guard $guard = "id";

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
