<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function  todayOrders(){
         $date=date('d-m-y');
     
         $data=DB::table('orders')->where('date',$date)->where('statuse',0)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
     }
     public function  todaydelivery(){
              $date=date('d-m-y');
     
         $data=DB::table('orders')->where('date',$date)->where('statuse',3)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);

     }
     public function  thisMonthorders(){
         $month=date('F');
               $data=DB::table('orders')->where('month',$month)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);

     }
     public function  thisMonthdelivery(){
                $month=date('F');
               $data=DB::table('orders')->where('month',$month)->where('statuse',3)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);

     }
     public function  ordersearch(){

        return view('ordersearch');

     }

   public function SrcOrderDatewise(Request $request){
       $date=$request->date;
       $datenew=date('d-m-y',strtotime($date));
        $data=DB::table('orders')->where('date',$datenew)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);

   }
   public function SrcOrderMonthwise(Request $request){
               $data=DB::table('orders')->where('month',$request->month)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);

   }
   public function SrcOrderYearwise(Request $request){

         $data=DB::table('orders')->where('year',$request->year)->get();
        return view('admin.userorders.neworderlist',['neworder'=>$data]);
   }
}
