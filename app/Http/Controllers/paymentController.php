<?php

namespace App\Http\Controllers;

use Cart;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use Session;

class paymentController extends Controller
{
   
    public function paynow(Request $request)
    {
        if(Auth::check())
        {
            $cart=Cart::content();
            $data=array();
            $data['name']=$request->name;
            $data['phone']=$request->phone;
            $data['email']=$request->email;
            $data['address']=$request->address;
            $data['payment']=$request->payment;
            $data['city']=$request->city;
            //  dd($data);
          
            if($request->payment=='ideal')
            {
                  return view('payment.idealpay',['data'=>$data],['request'=>$request]);


            }
            elseif($request->payment=='paypal'){
                return view('payment.paypelpay',['data'=>$data]);

            }
            elseif($request->payment=='stripe'){
                return view('payment.stripepay',['data'=>$data,'cart'=>$cart,'request'=>$request]);
            }
        }
        else{
            return redirect()->to('login');

        }
        
    }

    public function stripecharge(Request $request)
    {
        $extracharge=DB::table('extracharges')->first();

        // Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_51HDxSEEnc64osRuYPAAALNSRydJw5dMEUHnOMUWiLryQkhiZOTCHKSrV9S7G5SuaGANzTMXOUljE3m9xc6fgEKod00B7bsCgb3');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
  'amount' => 999*100,
  'currency' => 'usd',
  'description' => 'kazis shop charge',
  'source' => $token,
  'metadata' => ['order_id' => uniqid()],
]);


$order=array();
$order['user_id']=Auth::user()->id;
$order['payment_method']=$charge->payment_method;
$order['bln_transection']=$charge->balance_transaction;
$order['order_id']=$charge->metadata->order_id;
$order['paying_amount']=$charge->amount;
$order['shipping']=$extracharge->shipping;
$order['vat']=$extracharge->vat;
$order['total']=$charge->amount;
$order['statuse']='0';
$order['date']=date('d-m-y');
$order['month']=date('F');
$order['year']=date('Y');
$order['total']=$charge->amount;

if(session::has('coupon'))
{
    $order['subtotal']=session::get('coupon')['0']['amount'];
}
else{
     $order['subtotal']=cart::subtotal();

}
$orderid=DB::table('orders')->insertGetId($order);

// shipping info add in table
$shipping=array();
$shipping['order_id']=$orderid;
$shipping['ship_name']=$request->name;
$shipping['ship_phone']=$request->phone;
$shipping['ship_email']=$request->email;
$shipping['ship_address']=$request->address;
$shipping['ship_city']=$request->city;
DB::table('shippings')->insert($shipping);

$cartitem=cart::content(); 

$orderdetails=array();
 foreach($cartitem as $item){
$orderdetails['order_id']=$orderid;
$orderdetails['product_id']=$item->id;
$orderdetails['product_name']=$item->name;
$orderdetails['qty']=$item->qty;
$orderdetails['single_price']=$item->price;
$orderdetails['total_price']=$item->price * $item->qty;
$orderdetails['color']=$item->options->color;
$orderdetails['size']=$item->options->size;
DB::table('orderdetails')->insert($orderdetails);
 }

  cart::destroy();
 if(session::has('coupon'))
 {
     session::forget('coupon');
 }

       $notification=array(
                'messege'=>'successfully payment done',
                'alert-type'=>'success'
                 );
                return Redirect()->to('/')->with($notification);
       


 
    }
}
