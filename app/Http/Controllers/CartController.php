<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Auth;

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

     public function cartAdd(Request $request,$id)
    {
      
       $data=DB::table('products')->where('id',$id)->first();
      
       $addcart=array();
       if($data->discount_price==null)
       {
       $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
       $addcart['qty']=$request->qty;
       $addcart['price']=$data->selling_price;
       $addcart['weight']=1;
         $addcart['options']['image']=$data->image_one; 
       $addcart['options']['color']=$request->color; 
       $addcart['options']['size']=$request->size; 
       Cart::add($addcart);
    
      $notification=array(
                'messege'=>'successfully add in cart',
                'alert-type'=>'success'
                 );
               return Redirect()->to('/')->with($notification);
             


      }
       else{
        $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
       $addcart['qty']=$request->qty;
       $addcart['price']=$data->discount_price;
       $addcart['weight']=1;
       $addcart['options']['image']=$data->image_one; 
       $addcart['options']['color']=$request->color; 
       $addcart['options']['size']=$request->size; 
       Cart::add($addcart);
   
        $notification=array(
                'messege'=>'successfully add in cart ',
                'alert-type'=>'success'
                 );
                return Redirect()->to('/')->with($notification);
               
       }
     
    }
    public function showCart()
    {
      $data=Cart::content();
        //  return $data;
       return view('CartShow',['cart'=>$data]);
      
    }
    public function deleteCartItem($id)
    {
      Cart::remove($id);
      return redirect()->back();
    }
    public function updateCartItem( Request $request) 
    {
      $id=$request->id;
      $val=$request->qty;
       Cart::update($id,$val);
       if(Session::has('coupon'))
       {
         
         $check=DB::table('coupons')->where('coupon_code',Session::get('coupon')[0]['name'])->first();
           $replaceamount=str_replace(",","",Cart::subtotal());
         $amountflot=(double)$replaceamount;
         $data=Session::forget('coupon');

         Session::push('coupon', [
                        'name' => $check->coupon_code,
                        'discount' => $check->discount,
                        'amount' =>$amountflot-$check->discount,
                       
                     ]);  
        //               $data=Session::forget('amount');
        //  Session::push('amount',$amountflot-$check->discount);
        // $data=Session::get('amount');
         return redirect()->back();
       }
       else{
              return redirect()->back();
       }
       
    }

    public function Cartdetails(Request $request)
    {
        $data=DB::table('products')->join('categories','products.category_id','categories.id')->join('subcategories','products.subcategory_id','subcategories.id')->join('brands','products.brand_id','brands.id')->where('products.id',$request->id)->where('products.status',1)->select('products.*','brands.brand_name','categories.category_name','subcategories.subcategory_name')->first();

        $color=$data->product_colour;
        $arcolor=explode(',',$color);
        $size=$data->product_size;
        $arsize=explode(',',$size);
       return response()->json(array(
         'product'=>$data,
         'colour'=>$arcolor,
         'size'=>$arsize,
       ));

    }

    public function saveincart(Request $request)
    {
      // return response()->json($request);
     $data=DB::table('products')->where('id',$request->pid)->first();
      
       $addcart=array();
       if($data->discount_price==null)
       {
       $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
       $addcart['qty']=$request->quantity;
       $addcart['price']=$data->selling_price;
       $addcart['weight']=1;
       $addcart['options']['image']=$data->image_one; 
       $addcart['options']['size']=$request->size; 
       $addcart['options']['color']=$request->color; 
       Cart::add($addcart);
     
      $notification=array(
                'messege'=>'successfully add in cart',
                'alert-type'=>'success'
                 );
               return Redirect()->to('/')->with($notification);
             


      }
       else{
        $addcart['id']=$data->id;
       $addcart['name']=$data->product_name;
        $addcart['qty']=$request->quantity;
       $addcart['price']=$data->discount_price;
       $addcart['weight']=1;
       $addcart['options']['image']=$data->image_one; 
       $addcart['options']['size']=$request->size; 
       $addcart['options']['color']=$request->color; 
       Cart::add($addcart);
         $notification=array(
                'messege'=>'successfully add in cart ',
                'alert-type'=>'success'
                 );
                return Redirect()->to('/')->with($notification);
       }

    
     }
     public function usercheckout()
     {
       if(Auth::check()){

           $data=Cart::content();
       return view('cartcheckout',['cart'=>$data]);

       }
       else{
            $notification=array(
                'messege'=>'First login your id ',
                'alert-type'=>'success'
                 );
                return Redirect()->route('login')->with($notification);

       }
     }

     public function userwishlist() 
     {
       if(Auth::check())
       {
         $wish=DB::table('wishlists')->where('user_id',Auth::user()->id)
         ->join('products','wishlists.product_id','products.id')->select('products.*','wishlists.user_id')->get();
          // return response()->json($wish);
         return view('wishlistpage',['wish'=>$wish]);


       }
       

     }
     public function couponapply(Request $request)
     {
       $check=DB::table('coupons')->where('coupon_code',$request->coupon)->first();
       if($check)
       {
        
         $replaceamount=str_replace(",","",Cart::subtotal());
         $amountflot=(double)$replaceamount;

         Session::push('coupon', [
                        'name' => $check->coupon_code,
                        'discount' => $check->discount,
                        'amount' =>$amountflot-$check->discount,
                       
                     ]);  
                      // $data=Session::get('coupon');
                    
                    // Session::forget('coupon');
                      // return response()->json($data);
                 $notification=array(
                'messege'=> ' coupon accepted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

       }
       else{
         $notification=array(
                'messege'=>'coupon code is not available',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
       }
       
     }
     public function deletecouponsession()
     {
       Session::forget('coupon');
           $notification=array(
                'messege'=>'inactive coupon',
                'alert-type'=>'success'
                 );
                return Redirect()->back()->with($notification);
       }
     
    
    
}
