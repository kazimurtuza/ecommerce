<?php

namespace App\Http\Controllers\Admin\wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishadd(Request $request)
    {
       
           
           if(Auth::check())
           {
               $user_id= Auth::user()->id;
            $data=DB::table('wishlists')->where('user_id',$user_id)->where('product_id',$request->id)->first();
                if($data)
            {
                 return response()->json(['error' => 'product alredy has in your wishlist ']); 
                 
               
            }
                else{
                     $add=array('user_id'=>$user_id,'product_id'=>$request->id);
                DB::table('wishlists')->insert($add);
                  return response()->json(['success' => 'Successfully Added on your wishlist']); 
                
            }

           }
                else{
                 return response()->json(['error' => 'first you should login or register id ']); 
            }
        
          


        
    
       
    }
}
