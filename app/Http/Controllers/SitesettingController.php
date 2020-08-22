<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitesettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function CompanyInfoSetting()
    {

        $data=DB::table('sitesettings')->first();
        return view('admin.CompanyInfoSetting', ['data'=>$data]);
        // return response()->json($data);
    }
    public function updateCopanyinfo(Request $request)
    {
       $data=array();
       $data['phone_one']=$request->phone_one;
       $data['phone_two']=$request->phone_two;
       $data['company_name']=$request->company_name;
       $data['company_Email']=$request->company_Email;
       $data['company_address']=$request->company_address;
       $data['facebook_link']=$request->facebook_link;
       $data['youtube_link']=$request->youtube_link;
       $data['twitter_link']=$request->twitter_link;
       $data['instagram_link']=$request->instagram_link;
       DB::table('sitesettings')->update($data);
       $notification=array(
                           'messege'=>'Successfully update company info',
                           'alert-type'=>'success'
                          );
                      return Redirect()->to('/')->with($notification); 
       
              
    }
}
