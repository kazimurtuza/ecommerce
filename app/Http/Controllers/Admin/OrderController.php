<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function neworders()
    {
       $data=DB::table('orders')->where('statuse',0)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
    }
    public function neworderdetails(Request $request, $id)
    {
       $data=DB::table('orderdetails')->join('products','orderdetails.product_id','products.id')->select('products.product_code','products.image_one','orderdetails.*')->where('orderdetails.order_id',$id)->get();
        $datashipping=DB::table('shippings')->where('order_id',$id)->first();
        $dataorder=DB::table('orders')->where('id',$id)->first();
         return view('admin.userorders.orderdetails',['orderinfo'=>$dataorder,'datashipping'=>$datashipping,'details'=>$data]);
    }

    public function acceptpayment($id)
    {
        DB::table('orders')->where('id',$id)->update(['statuse'=>1]);
              $notification=array(
                'messege'=>'payment accepted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.neworders')->with($notification);

    }
public function cancelorder($id)
{
     DB::table('orders')->where('id',$id)->update(['statuse'=>4]);
              $notification=array(
                'messege'=>'Order canceled',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.neworders')->with($notification); 
}

public function OrderProgress($id)
{
         DB::table('orders')->where('id',$id)->update(['statuse'=>2]);
              $notification=array(
                'messege'=>'Order Progress success',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.neworders')->with($notification); 

}
public function OrderDone($id)
{
      DB::table('orders')->where('id',$id)->update(['statuse'=>3]);
              $notification=array(
                'messege'=>'Order Done',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.neworders')->with($notification); 

}

public function acceptpaymentlist(){
    
   $data=DB::table('orders')->where('statuse',1)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
}
public function progressdelevery(){
      $data=DB::table('orders')->where('statuse',2)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
}
public function Deleverysuccess(){
     $data=DB::table('orders')->where('statuse',3)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
}
public function cancelorders(){
    $data=DB::table('orders')->where('statuse',4)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
}

}
    

