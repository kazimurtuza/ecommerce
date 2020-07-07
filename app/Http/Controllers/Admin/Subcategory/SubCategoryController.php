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
       
         $category=category::all();
         $data=DB::table('subcategories')->join('categories','subcategories.category_id','=','categories.id')->select('subcategories.*','categories.category_name')->get();
        
        return view('Admin.subcategory.sub_category',['data'=>$data],['category'=>$category]);
       
       
    }

    public function Storesubcategory(Request $request)
    {
        $request->validate([

            'sub_category_name'=>'required|max:55',

        ]);

        $subcategory=array();
        $subcategory['subcategory_name']=$request->sub_category_name;
        $subcategory['category_id']=$request->category_id;
        DB::table('subcategories')->insert($subcategory);

            $notification=array(
                'messege'=>'subcategory inserted successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

    }

    public function ShowEditsubcategory($id)
    {
         $subcategory=subcategory::find($id);
         $category=category::all();
        return  view('Admin.subcategory.edit_subcategory',['category'=>$category],['subcategory'=>$subcategory]);
       
    }      

    public function Updatesubcategory(Request $request,$id)
    {
        $request->validate([
            
            'subcategory_name'=>'required|max:55',
        ]);

        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['category_id']=$request->category_id; 
        $updatedata=DB::table('subcategories')->where('id',$id)->update($data);
      if($updatedata)
      {
             $notification=array(
                'messege'=>'update sub_category  successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('subcategorys')->with($notification);

      }
      else{
          $notification=array(
                'messege'=>'Nothing to update',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);

      }
     


    }


    public function deleteSubcategory($id)
    {

        $delete=DB::table('subcategories')->where('id',$id)->delete();
        if($delete)
        {
              $notification=array(
                'messege'=>'Delete sub_category  successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('subcategorys')->with($notification);

        }
        else{
              $notification=array(
                'messege'=>'Delete Not  success',
                'alert-type'=>'error'
                 );
               return Redirect()->route('subcategorys')->with($notification);

        }

    }


    }

