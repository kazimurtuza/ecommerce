<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
      protected $fillable=[
        'coupon_code',
        'discount',
    ];
}
