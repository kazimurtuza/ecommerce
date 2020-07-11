<?php

namespace App\Http\Controllers;

use App\Model\Frontend\newslater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewslaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => ['storenewslater']]);
    }
    
    public function storenewslater(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:newslaters|max:55',

        ]);
        $newslater=array();
        $newslater['email']=$request->email;
        DB::table('newslaters')->insert($newslater);
         $notification=array(
                'messege'=>'thanks for subscribing',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

    }

    public function newslater()
    {
        $newslater=newslater::all();
        return view('Admin/newslater/newslater',['newslater'=>$newslater]);
    }

    public function Deletenewslater(Request $request,$id)
    {
        DB::table('newslaters')->where('id',$id)->delete();
          $notification=array(
                'messege'=>'successfully deleted ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

    }
}
