<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnOrderController extends Controller
{
    public function ReturnOrder()
    {
        return view('return.ReturnOrder');

    }
    public function ReturnOrdersend($id)
    {
          DB::table('orders')->where('id',$id)->update(['returnorder'=>1]);
           $notification=array(
                'messege'=>'successfully payment done',
                'alert-type'=>'success'
                 );
                return Redirect()->back()->with($notification);

    }
}
