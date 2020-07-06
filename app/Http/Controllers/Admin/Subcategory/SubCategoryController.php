<?php

namespace App\Http\Controllers\Admin\subcategory;

use App\Http\Controllers\Controller;
use App\Model\Admin\category;
use App\Model\Admin\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function subcategory()
     {
         $subcategory=subcategory::all();
        
        return view('Admin.subcategory.sub_category',['subcategory'=>$subcategory]);
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


    }
}
