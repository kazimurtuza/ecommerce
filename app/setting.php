<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable=[
        'val',
'shipping_charge',
'shopname',
'email',
'phone',
'address',
'logo',
    ];
}
