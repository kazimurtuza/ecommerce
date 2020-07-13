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
        return 'done';
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
}
