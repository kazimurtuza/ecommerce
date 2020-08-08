<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productviewController extends Controller
{
       public function subcategorywiseShow($id)
    {
        $products=DB::table('products')->where('subcategory_id',$id)->paginate(30);
         $brands= DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();

        return view('productshowbysubcate',['products'=>$products,'brands'=>$brands]);
       
    }
}
