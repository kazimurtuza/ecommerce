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

    public function searchproduct(Request $request){

         $item=$request->search;
         $products=DB::table('products')->join('brands','products.brand_id','brands.id')->where('products.product_name','Like',"%{$item}%")->orWhere('brands.brand_name','Like',"%{$item}%")->select('products.*','brands.brand_name')->get();
        //   return response()->json($products);

         return view('productshowbysubcate',['products'=>$products]);
     

    }
}
