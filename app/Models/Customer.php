<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
      protected Guard $guard = "id";

      public function user()
      {
        return $this->belongsTo(User::class);
      }
}
