<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productInfoController extends Controller
{
    public function productinfo($id,$product_name)
    {

      // $allproduct=DB::table('products')->join('categories','categories.id','=','products.category_id')
      //  ->join('brands','brands.id','=','products.brand_id')->select('products.*','categories.category_name','brands.brand_name')->get();
    
      $info=DB::table('products')->join('categories','categories.id','=','products.category_id')->join('brands','brands.id','products.brand_id')->join('subcategories','subcategories.id','products.subcategory_id')->where('products.id',$id)->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->first();
      $colour=$info->product_colour;
      $size=$info->product_size;
             $colourarray=explode(',',$colour);
             $sizearray=explode(',',$size);

      return view('productInfo',['product'=>$info,'Aproduct_size'=>$sizearray,'product_color'=>$colourarray]);

    // return response()->json($sizearray);
   
   
       
    }
   
}
