<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable=[
        'subcategory_name',
        'category_id',
    ];
}
