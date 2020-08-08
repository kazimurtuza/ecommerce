<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class blogController extends Controller
{
    public function blogshow()
    {
        $post=DB::table('posts')->join('categories','categories.id','posts.category_id')->select('posts.*',
        'categories.category_name')->get(); 
         return view('admin.blogs.blogshow',['post'=>$post]);
     
    }

    public function languageEnglish()
    {
        Session::forget('language');
        Session::put('language','english');
        $data=session::get('language');
        return redirect()->back();
        //  return response()->json($data);
    }
    public function languageBangla()
    {
        Session::forget('language');
        Session::put('language','bangla');
          $data=session::get('language');
        return redirect()->back();
        //  return response()->json($data);
    }
}
