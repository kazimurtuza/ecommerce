<?php

namespace App\Http\Controllers\Admin\product;
use App\Http\Controllers\Controller;
use App\Model\Admin\brand;
use App\Model\Admin\category;
use App\Model\Admin\coupon;
use App\Model\Admin\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addproduct()
    {
        $cate=category::all();
        $brand=brand::all();
        return view('Admin/product/product',['category'=>$cate,'brand'=>$brand]);
    }
    public function allproduct()
    {
       $allproduct=DB::table('products')->join('categories','categories.id','=','products.category_id')
       ->join('brands','brands.id','=','products.brand_id')->select('products.*','categories.category_name','brands.brand_name')->get();
       return view('Admin/product/allproduct',['product'=>$allproduct]);
  
    }
    public function subcategorylistshow(Request $request)
    {

       $data=subcategory::where('category_id',$request->id)->get();
        return view('Admin/product/ajaxsubcategory',['data'=>$data]);
    }

    public function storeproduct(Request $request)
    {

        $product=array();
        $product['category_id']=$request->category_id;
        $product['subcategory_id']=$request->subcategory_id;
        $product['brand_id']=$request->brand_id;
        $product['product_name']=$request->product_name;
        $product['product_code']=$request->product_code;
        $product['product_quantity']=$request->product_quantity;
        $product['product_details']=$request->product_details;
        $product['product_colour']=$request->product_colour;
        $product['product_size']=$request->product_size;
        $product['selling_price']=$request->product_price;
        $product['video_link']=$request->video_link;
        $product['main_slider']=$request->main_slider; 
        $product['hot_deal']=$request->hot_deal;
        $product['best_rated']=$request->best_rated;
        $product['mid_slider']=$request->mid_slider; 
        $product['buyone_getone']=$request->buyone_getone;
        $product['hot_new']=$request->hot_new;
        $product['trend']=$request->trend;
        $product['status']=1;

        $image_one=$request->image_one;
    	$image_two=$request->image_two;
    	$image_three=$request->image_three;

    if($image_one && $image_two && $image_three){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
                $product['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')
                          ->insert($product);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }

    elseif($image_one && $image_two){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 
                
                $product=DB::table('products')
                          ->insert($product);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }

    }

    public function productInactive($id)
    {
       DB::table('products')->where('id',$id)->update(['status'=>0]);
         $notification=array(
                     'messege'=>'Successfully Product Active ',
                     'alert-type'=>'success'
                    );
                      return Redirect()->back()->with($notification);   
    }
    public function productActive($id)
    {
         DB::table('products')->where('id',$id)->update(['status'=>1]);
         $notification=array(
                     'messege'=>'Successfully Product Inactive ',
                     'alert-type'=>'success'
                    );
                      return Redirect()->back()->with($notification);   
    }
    public function deleteproduct($id)
    {

        $data= DB::table('products')->where('id',$id)->first();
           if($data->image_one && $data->image_two && $data->image_three)
         {
         unlink($data->image_one);
         unlink($data->image_two);
         unlink($data->image_three);

         }
         DB::table('products')->where('id',$id)->delete();
         $notification=array(
                     'messege'=>' Product deleted ',
                     'alert-type'=>'success'
                    );
                      return Redirect()->back()->with($notification);   
    }

    public function details($id)
    {
          $details=DB::table('products')->join('categories','categories.id','=','products.category_id')
       ->join('brands','brands.id','=','products.brand_id')->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name') ->join('subcategories','subcategories.id','=','products.subcategory_id')->where([['products.id','=',$id]])->first();
    return view('Admin/product/productdetails',['details'=>$details]);
  

    }

    public function Editproduct($id)
    {
          $details=DB::table('products')->join('categories','categories.id','=','products.category_id')
       ->join('brands','brands.id','=','products.brand_id')->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name') ->join('subcategories','subcategories.id','=','products.subcategory_id')->where([['products.id','=',$id]])->first();
       $data=DB::table('subcategories')->join('categories','subcategories.category_id','=','categories.id')->get();
       $brand=DB::table('brands')->get();
        return view('Admin/product/Editproduct',['details'=>$details,'data'=>$data,'brand'=>$brand]);


    }
    public function updateproduct(Request $request,$id)
    {
              $product=array();
        $product['category_id']=$request->category_id;
        $product['subcategory_id']=$request->subcategory_id;
        $product['brand_id']=$request->brand_id;
        $product['product_name']=$request->product_name;
        $product['product_code']=$request->product_code;
        $product['product_quantity']=$request->product_quantity;
        $product['product_details']=$request->product_details;
        $product['product_colour']=$request->product_colour;
        $product['product_size']=$request->product_size;
        $product['selling_price']=$request->product_price;
        $product['video_link']=$request->video_link;
        $product['main_slider']=$request->main_slider; 
        $product['hot_deal']=$request->hot_deal;
        $product['best_rated']=$request->best_rated;
        $product['mid_slider']=$request->mid_slider; 
        $product['hot_new']=$request->hot_new;
        $product['buyone_getone']=$request->buyone_getone;
        $product['trend']=$request->trend;
        $product['discount_price']=$request->discount_price;
        $product['status']=1;
        $update=DB::table('products')->where('id',$id)->update($product);
        if($update)
        {
              $notification=array(
                     'messege'=>' Product update successfully ',
                     'alert-type'=>'success'
                    );
                      return Redirect()->route('all.product')->with($notification);  

        }
        else
        {
             $notification=array(
                     'messege'=>'nothing to  update ',
                     'alert-type'=>'info'
                    );
                      return Redirect()->route('all.product')->with($notification);  

        }
        

    }

    public function updateproductImage(Request $request,$id)
    {
         $image_one=$request->image_one;
    	$image_two=$request->image_two;
    	$image_three=$request->image_three;

        if($request->image_one &&$request->image_two && $request->image_three)
        {
            unlink($request->old_one);
            unlink($request->old_two);
            unlink($request->old_three);
             $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
                $product['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 1,2,3 ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);   
        }
        else if($request->image_two &&$request->image_three)
        {
            unlink($request->old_two);
            unlink($request->old_three);
            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
                $product['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 2,3 ',
                     'alert-type'=>'success'
                    );
                     return Redirect()->route('all.product')->with($notification);   
        }
        else if($request->image_one &&$request->image_three)
        {
            unlink($request->old_one);
            unlink($request->old_three);

              $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
                $product['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 1,3 ',
                     'alert-type'=>'success'
                    );
                 return Redirect()->route('all.product')->with($notification);   
            
        }
        else if($request->image_one &&$request->image_two)
        {
           unlink($request->old_one);
            unlink($request->old_two);

              $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 


                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 1,2 ',
                     'alert-type'=>'success'
                    );
                 return Redirect()->route('all.product')->with($notification);     
        }
        else if($request->image_one &&$request->image_two==null && $request->image_three==null )
        {
           unlink($request->old_one);
             $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
                $product['image_one']='public/media/product/'.$image_one_name;

                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 1 ',
                     'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);  
          
        }
    
        else if($request->image_two &&$request->image_one==null && $request->image_three==null )
        {
            unlink($request->old_two);

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
                $product['image_two']='public/media/product/'.$image_two_name; 
               
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 2 ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);  
          
        }
    
        else if($request->image_three &&$request->image_two==null && $request->image_one==null )
        {
            unlink($request->old_three);
          
            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
                $product['image_three']='public/media/product/'.$image_three_name; 
                
                $product=DB::table('products')->where('id',$id)
                          ->update($product);
                    $notification=array(
                     'messege'=>'Successfully upload Product image 3 ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);    
        }
    

    }
}
