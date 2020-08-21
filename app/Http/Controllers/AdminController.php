<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.login')->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }
    public function adduser(){

       return view('admin.userRole.adduser');

    }
    public function insertuser(Request $request){

   $request->validate([
    'name' => 'bail|required|max:255',
    'email' => 'bail|required|unique:admins|Email|max:255',
    'phone' => 'bail|required|unique:admins|max:255',
    
]);
      $data=array();
      $data['name']=$request->name;
      $data['phone']=$request->phone;
      $data['email']=$request->email;
      $data['category']=$request->category;
      $data['coupon']=$request->coupon;
      $data['order']=$request->order;
      $data['other']=$request->other;
      $data['product']=$request->product;
      $data['blog']=$request->blog;
      $data['report']=$request->report;
      $data['user_role']=$request->user_role;
      $data['return_order']=$request->return_order;
      $data['contact']=$request->contact;
      $data['product_comment']=$request->product_comment;
      $data['setting']=$request->setting;
      $data['password']=hash::make($request->password);
      $data['type']=2;
      DB::table('admins')->insert($data);
         $notification=array(
                'messege'=> ' successfully userAdd',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allusers')->with($notification);


    }
    public function allusers(){
      $data=DB::table('admins')->get();

       return view('admin.userRole.allusers',['user'=>$data]);
  
    }

   public function  deleteuser($id){
   DB::table('admins')->where('id',$id)->delete();
        $notification=array(
                'messege'=> ' successfully user deleted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allusers')->with($notification);

   }
   public function edituser($id){
    $data=DB::table('admins')->where('id',$id)->first();
     return view('admin.userRole.editusers',['user'=>$data]);

   }
   public function updateuser(Request $request){

      $data=array();
      $data['name']=$request->name;
      $data['phone']=$request->phone;
      $data['email']=$request->email;
      $data['category']=$request->category;
      $data['coupon']=$request->coupon;
      $data['order']=$request->order;
      $data['other']=$request->other;
      $data['product']=$request->product;
      $data['blog']=$request->blog;
      $data['report']=$request->report;
      $data['user_role']=$request->user_role;
      $data['return_order']=$request->return_order;
      $data['contact']=$request->contact;
      $data['product_comment']=$request->product_comment;
      $data['setting']=$request->setting;
      $data['password']=hash::make($request->password);
      $data['type']=2;
      DB::table('admins')->where('id',$request->id)->update($data);
         $notification=array(
                'messege'=> 'user profile update successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allusers')->with($notification);


   }

}
