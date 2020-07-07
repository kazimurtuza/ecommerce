<?php

namespace App\Http\Controllers\Admin\coupon;

use App\Http\Controllers\Controller;
use App\Model\Admin\coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function coupon()
    {
       $coupon=coupon::all();
        return view('Admin.coupon.coupon',['coupon'=>$coupon]);
    }
    public function Storecoupon(Request $request)
    {
         $validatedData = $request->validate([
        'coupon_code' => 'required|unique:coupons|max:255',
        'discount' => 'required|unique:coupons|max:255',
        
    ]);

       $data=array();
       $data['coupon_code']=$request->coupon_code;
       $data['discount']=$request->discount; 
       DB::table('coupons')->insert($data); 

           $notification=array(
                'messege'=>'coupon insert Done',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
 

    }

    public function ShowEditcoupon($id)
    {
        $coupon=coupon::find($id);
        return view('Admin.coupon.editcoupon',['coupon'=>$coupon]);
    }

   public function Updatecoupon(Request $request,$id)
   {
       $validatedData = $request->validate([
         'coupon_code' => 'required|max:255',
        'discount' => 'required|max:255',
        
    ]);

        $update=array();
        $update['coupon_code']=$request->coupon_code;
        $update['discount']=$request->discount;
        $update=DB::table('coupons')->where('id',$id)->update($update);
        if($update){
             $notification=array(
                'messege'=>'coupon update successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('coupons')->with($notification);

        }
        else{
            $notification=array(
                'messege'=>'Nothing to update ',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);


   }
}

public function deletecoupon($id)
{
    DB::table('coupons')->where('id',$id)->delete();

        //...... notification send.............
         $notification=array(
                'messege'=>'coupon deleted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);


}



  
  
}
