<?php

namespace App\Http\Controllers\Admin\brand;

use App\Http\Controllers\Controller;
use App\Model\Admin\brand;
use App\Model\Admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand()
    {
        $brand=brand::all();
        
        return view('Admin.brand.brand',['brand'=>$brand]);
    }

    public function storebrand(Request $request)
    {
        $request->validate([
            'brand_name'=>'required|max:55'
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('brand_logo');
        if($image){

             $ext=strtolower($image->getClientOriginalExtension());
        $image_name=date('d_m_y_h_m_s');
        $image_fullname=$image_name.'.'.$ext;
        $image_path='public/media/brand/';
        $image_url=$image_path.$image_fullname;

        $setimage=$image->move($image_path,$image_fullname); 

        $data['brand_logo']=$image_url;
         DB::table('brands')->insert($data);

          $notification=array(
                'messege'=>'brand insert successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
            
        }
       else{

        DB::table('brands')->insert($data);

             $notification=array(
                'messege'=>'brand insert successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
            
        }

       }

       public function deletebrand($id)
       {
        
          $data= brand::find($id)->first();
            unlink($data->brand_logo);

         DB::table('brands')->where('id',$id)->delete();
           $notification=array(
                'messege'=>'brand deleted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    

       }

       public function ShowEditBrand($id)
       {
          $brand=brand::find($id)->first();
          
          return view('Admin.brand.edit_brand',['brand'=>$brand]);

       }

       public function UpdateBrand(Request $request,$id)
       {
           
           $old_image=brand::find($id)->first()->brand_logo;
           $data=array();
           $data['brand_name']=$request->brand_name;
           $image=$request->file('brand_logo');
           if($image){
               unlink($old_image);
               $ext=strtolower($image->getClientOriginalExtension());
               $image_name=date('d_m_y_h_s');
               $image_fullname=$image_name.'.'.$ext;
               $image_path='public/media/brand/';
               $image_url=$image_path.$image_fullname;
               $setimage=$image->move($image_path,$image_fullname);
               $data['brand_logo']=$image_url;
                DB::table('brands')->where('id',$id)->update($data);

                   $notification=array(
                'messege'=>'brand updated ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('brands')->with($notification);
           }

           else{
                DB::table('brands')->where('id',$id)->update($data);

                   $notification=array(
                'messege'=>'brands name update successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('brands')->with($notification);

           }



        

       }



       


    
    // public function storeCategory(Request $request)
    // {
    //      $validatedData = $request->validate([
    //     'category_name' => 'required|unique:categories|max:255',
        
    // ]);

    //    $data=array();
    //    $data['category_name']=$request->category_name;
    //    DB::table('categories')->insert($data); 

    //        $notification=array(
    //             'messege'=>'category insert Done',
    //             'alert-type'=>'success'
    //              );
    //            return Redirect()->back()->with($notification);
 
   
    // }

    // public function DeleteCategory($id)
    // {
    //     DB::table('categories')->where('id',$id)->delete();

    //     //...... notification send.............
    //      $notification=array(
    //             'messege'=>'category deleted successfully',
    //             'alert-type'=>'success'
    //              );
    //            return Redirect()->back()->with($notification);

    // }

    // public function showeditCategory($id)
    // {
    //    $data=DB::table('categories')->where('id',$id)->first();
    //     return view('Admin.category.editcategory',['category'=>$data]);

    // }
    // public function updateCategory(Request $request,$id)
    // {
    //     $validatedData = $request->validate([
    //     'category_name' => 'required|max:255',
    //       ]);

    //     $updatecategory=array();
    //     $updatecategory['category_name']=$request->category_name;
    //     $update=DB::table('categories')->update($updatecategory);
    //     if($update){
    //          $notification=array(
    //             'messege'=>'category update successfully',
    //             'alert-type'=>'success'
    //              );
    //            return Redirect()->route('categorys')->with($notification);

    //     }
    //     else{
    //         $notification=array(
    //             'messege'=>'Nothing to update ',
    //             'alert-type'=>'error'
    //              );
    //            return Redirect()->back()->with($notification);


    //     }


    // }
}
