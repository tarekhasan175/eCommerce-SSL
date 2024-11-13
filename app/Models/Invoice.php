<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected Guard $guard = "id";
}
