<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;


class CartController extends Controller
{
    public function addcart(Request $request)
    {
       $data=DB::table('products')->where('id',$request->id)->first();
      
       $addcart=array();
       if($data->discount_price==null)
       {
       $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
       $addcart['qty']=1;
       $addcart['price']=$data->selling_price;
       $addcart['weight']=1;
       $addcart['options']['image']=$data->image_one; 
       Cart::add($addcart);
       return response()->json(['success' => 'Successfully Added on your cart']);

       }
       else{
        $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
       $addcart['qty']=1;
       $addcart['price']=$data->discount_price;
       $addcart['weight']=1;
       $addcart['options']['image']=$data->image_one; 
       Cart::add($addcart);
         return response()->json(['success' => 'Successfully  Added on your cart hare have discount']);
       }

    }
    public function check()
    {
      $content=Cart::content();
      return response()->json($content);

    }
}
