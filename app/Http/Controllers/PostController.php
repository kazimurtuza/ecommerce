<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function blogCategory()
    {
        $category=DB::table('post_categories')->get();
        
        return view('admin/blogs/post_category',['category'=>$category]);
    }
    public function storeCategory(Request $request)
    {
        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_ba']=$request->category_name_ba;
        DB::table('post_categories')->insert($data);
  
         $notification=array(
                'messege'=>'category add successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
       
    }
    public function deleteCategory(Request $request,$id)
    {
        
       
        DB::table('post_categories')->where('id',$id)->delete();
  
         $notification=array(
                'messege'=>'category successfully deleted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('blog.category')->with($notification);
       
    }
    //  public function updateCategory(Request $request,$id)
    // {
    //     $data=array();
    //     $data['category_name_en']=$request->category_name_en;
    //     $data['category_name_ba']=$request->category_name_ba;
    //     DB::table('post_categories')->where('id',$id)->update($data);
  
    //      $notification=array(
    //             'messege'=>'category update successfully',
    //             'alert-type'=>'success'
    //              );
    //            return Redirect()->back()->with($notification);
       
    // }
    public function blogPost()
    {
        return view('admin.blogs.post');

    }
    public function blogPostadd(Request $request)
    {
        $image_one=$request->image_one;
       $data=array();
       $data['post_title_en']=$request->english_title;
       $data['post_title_ba']=$request->bangla_title;
       $data['details_en']=$request->english_post;
       $data['details_ba']=$request->bangla_post;
       $data['category_id']=$request->category;
       if($image_one)
       {
           
      $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->insert($data);
                          
                    $notification=array(
                     'messege'=>'Successfully insert post',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);  

       }
       else{
                       DB::table('posts')->insert($data);
                          
                    $notification=array(
                     'messege'=>'Successfully insert post without photo',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification); 
       }
     


    }
    public function blogAllpost()
    {
      $allpost=DB::table('posts')->join('post_categories','post_categories.id','=','posts.category_id')->select('posts.*','post_categories.category_name_en','post_categories.category_name_ba')->get();
      
       return view('admin/blogs/allpost',['allpost'=>$allpost]);
         
            
       

    }
    public function Editpost($id)
    {
       $post=DB::table('posts')->where('id',$id)->first();
         return view('admin/blogs/EditPost',['post'=>$post]);
       

    }
    public function deletepost($id)
    {
      DB::table('posts')->where('id',$id)->delete();
       $notification=array(
                     'messege'=>'Successfully deleted post',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('blog.allpost')->with($notification); 
 
    
    }

    public function updatepost(Request $request,$id)
    {
     $image_one=$request->image_one;
       $data=array();
       $data['post_title_en']=$request->english_title;
       $data['post_title_ba']=$request->bangla_title;
       $data['details_en']=$request->english_post;
       $data['details_ba']=$request->bangla_post;
       $data['category_id']=$request->category;
       if($image_one)
       {
           if($request->old_image !==null)
           {

             unlink($request->old_image);
           }
          
           
      $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->where('id',$id)->update($data);
                          
                    $notification=array(
                     'messege'=>'Successfully update post',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('blog.allpost')->with($notification);  

       }
       else{
                       DB::table('posts')->where('id',$id)->update($data);
                          
                    $notification=array(
                     'messege'=>'Successfully update post without photo',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('blog.allpost')->with($notification); 
       }
    }
}
