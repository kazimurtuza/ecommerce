<?php


// Social
 Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
 Route::get('/callback/{provider}', 'SocialController@callback');
//end socialite

Route::get('/', function () {return view('pages.index');});

//auth & user
Auth::routes(['verify' => true]); 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout'); 

//admin=======
Route::get('admin/home','AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// admin section ...........................................................................

// -------------user add show------------------------------
Route::get('admin/adduser', 'AdminController@adduser')->name('adduser');
Route::post('admin/insertuser', 'AdminController@insertuser')->name('insertuser');
Route::get('admin/allusers', 'AdminController@allusers')->name('allusers');
Route::get('delete/user/{id}', 'AdminController@deleteuser');
Route::get('Edit/user/{id}', 'AdminController@edituser');
Route::post('updateuser/user', 'AdminController@updateuser')->name('updateuser');

// Company info settion

Route::get('admin/CompanyInfoSetting', 'SitesettingController@CompanyInfoSetting')->name('CompanyInfoSetting');
Route::post('admin/updateCopanyinfo', 'SitesettingController@updateCopanyinfo')->name('updateCopanyinfo');
//Database backup
Route::get('admin/DatabaseBackup','SitesettingController@DatabaseBackup')->name('DatabaseBackup');
Route::get('admin/backupNow','SitesettingController@DBbackupNow')->name('backupNow');
Route::get('database/download/{name}','SitesettingController@DBdownload');
Route::get('database/delete/{name}','SitesettingController@DBdelete'); 



//orders
Route::get('admin/neworders','Admin\OrderController@neworders')->name('admin.neworders');
Route::get('neworders/details/{id}','Admin\OrderController@neworderdetails');  
Route::get('admin/payment/accept/{id}','Admin\OrderController@acceptpayment');
Route::get('admin/order/cancel/{id}','Admin\OrderController@cancelorder');
Route::get('admin/Delevery/Progress/{id}','Admin\OrderController@OrderProgress');
Route::get('admin/Delevery/Done/{id}','Admin\OrderController@OrderDone');

Route::get('admin/accept/payment/list','Admin\OrderController@acceptpaymentlist')->name('admin.accept.payment');
Route::get('admin/progress/delevery','Admin\OrderController@progressdelevery')->name('admin.progress.delevery');
Route::get('admin/Delevery/successt','Admin\OrderController@Deleverysuccess')->name('admin.Delevery.success');
Route::get('admin/cancel/orders','Admin\OrderController@cancelorders')->name('admin.cancel.orders');

// ReturnOrder
Route::get('user/ReturnOrder','ReturnOrderController@ReturnOrder')->name('ReturnOrder');
Route::get('user/return/{id}','ReturnOrderController@ReturnOrdersend');

Route::get('Admin/Returnlist','AdminController@Returnlist')->name('Returnlist');
Route::get('Admin/Returngrantedlist','AdminController@Returngrantedlist')->name('Returngrantedlist');
Route::get('admin/Returnaccept/{id}','AdminController@Returnaccept');
 


// reports
Route::get('admin/todayOrders','ReportController@todayOrders')->name('todayOrders');
Route::get('admin/todaydelivery','ReportController@todaydelivery')->name('todaydelivered');
Route::get('admin/thisMonthorders','ReportController@thisMonthorders')->name('thisMonthorders');
Route::get('admin/thisMonthdelivery','ReportController@thisMonthdelivery')->name ('thisMonthdelivery');
Route::get('admin/ordersearch','ReportController@ordersearch')->name('ordersearch'); 

//report search update/category/

Route::post('admin/SrcOrderDatewise','ReportController@SrcOrderDatewise')->name('SrcOrderDatewise'); 
Route::post('admin/SrcOrderMonthwise','ReportController@SrcOrderMonthwise')->name('SrcOrderMonthwise'); 
Route::post('admin/SrcOrderYearwise','ReportController@SrcOrderYearwise')->name('SrcOrderYearwise'); 






// Order stock
Route::get('admin/stock','Admin\product\ProductController@stock')->name('stock');

// Order tracking
Route::post('user/trackingOrder','CartController@trackingOrder')->name('trackOrder');



// category aprt...........................

Route::get('admin/categorys', 'Admin\Category\CategoryController@category')->name('categorys');  
Route::post('admin/store/category', 'Admin\Category\CategoryController@storeCategory')->name('store.category');  
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@DeleteCategory')->name('delete/category/');   
Route::get('showedit/category/{id}', 'Admin\Category\CategoryController@showeditCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updateCategory');
// brand.....................................
Route::get('admin/brands', 'Admin\brand\BrandController@brand')->name('brands');  
Route::post('admin/store/brand', 'Admin\brand\BrandController@storebrand')->name('store.brand');  
Route::get('delete/brand/{id}', 'Admin\brand\BrandController@deletebrand');
Route::get('showedit/brand/{id}', 'Admin\brand\BrandController@ShowEditBrand');
Route::post('update/brand/{id}', 'Admin\brand\BrandController@UpdateBrand');


//subcategory......................................
Route::get('admin/subcaategory', 'Admin\Subcategory\SubCategoryController@subcategory')->name('subcategorys');  
Route::post('Admin/store/sub_category', 'Admin\Subcategory\SubCategoryController@Storesubcategory')->name('store.sub_category');  
Route::get('showedit/sub_category/{id}', 'Admin\Subcategory\SubCategoryController@ShowEditsubcategory');
Route::post('update/subcategory/{id}', 'Admin\Subcategory\SubCategoryController@Updatesubcategory');
Route::get('delete/subcategory/{id}', 'Admin\Subcategory\SubCategoryController@deleteSubcategory');

//cupon......................................
Route::get('admin/coupon', 'Admin\coupon\CouponController@coupon')->name('coupons');  
Route::post('Admin/store/coupon', 'Admin\coupon\CouponController@Storecoupon')->name('store.coupon');  
Route::get('showedit/coupon/{id}', 'Admin\coupon\CouponController@ShowEditcoupon');
Route::post('update/coupon/{id}', 'Admin\coupon\CouponController@Updatecoupon');
Route::get('delete/coupon/{id}', 'Admin\coupon\CouponController@deletecoupon');

// newsletter.............
Route::post('store/newslater','NewslaterController@storenewslater')->name('store.newslater');
Route::get('admin/newslater', 'NewslaterController@newslater')->name('newslater');  
Route::get('delete/newslater/{id}', 'NewslaterController@Deletenewslater');

// product..............

Route::get('admin/add/product','Admin\product\ProductController@addproduct')->name('add.product');
Route::post('admin/store/product','Admin\product\ProductController@storeproduct')->name('store.product');
Route::get('admin/all/product','Admin\product\ProductController@allproduct')->name('all.product');
Route::get('subcategorylistshow','Admin\product\ProductController@subcategorylistshow')->name('subcategorylistshow');

// product show subcategory wise..............
Route::get('productshow/bysubcata/{id}','productviewController@subcategorywiseShow');  



// product search.............
Route::post('search/product','productviewController@searchproduct')->name('searchproduct');  



// product active inactive...............
Route::get('inactive/product/{id}','Admin\product\ProductController@productInactive');
Route::get('active/product/{id}','Admin\product\ProductController@productActive');
Route::get('delete/product/{id}','Admin\product\ProductController@deleteproduct');
Route::get('details/product/{id}','Admin\product\ProductController@details');
Route::get('Edit/product/{id}','Admin\product\ProductController@Editproduct');
Route::post('update/product/{id}','Admin\product\ProductController@updateproduct');
Route::post('product/image/update/{id}','Admin\product\ProductController@updateproductImage');


// blogs post
Route::get('blog/category','PostController@blogCategory')->name('blog.category');
Route::post('store/blog/category','PostController@storeCategory')->name('store.blogs_category');
Route::get('delete/blog/category/{id}','PostController@deleteCategory');
Route::post('update/blog/category','PostController@updateCategory')->name('update.blogs_category');
Route::get('blog/post','PostController@blogPost')->name('blog.post');
Route::post('blog/post/add','PostController@blogPostadd')->name('blog.post.add');
Route::get('blog/allpost','PostController@blogAllpost')->name('blog.allpost');
Route::get('Edit/post/{id}','PostController@Editpost');
Route::get('delete/post/{id}','PostController@deletepost'); 
Route::post('update/blog/post/{id}','PostController@updatepost'); 
Route::get('blog/post/show','blogController@blogshow')->name('blog.post.show'); 
Route::get('post/english','blogController@languageEnglish')->name('post.english'); 
Route::get('post/bangla','blogController@languageBangla')->name('post.bangla'); 

//wishlist add
Route::get('wishlist','Admin\wishlist\WishlistController@wishadd')->name('wishlist');
//addcard add
 Route::get('addcart','CartController@addcart')->name('addcart');
 Route::get('check','CartController@check')->name('check');

//  cart product details see
Route::get('see/product/details/{id}/{product_name}','productInfoController@productinfo');
Route::post('cart/product/add/{id}','CartController@cartAdd');
Route::get('cart/show','CartController@showCart')->name('cart.show');
Route::get('delete/cart/item/{id}','CartController@deleteCartItem');
Route::post('update/cart/item','CartController@updateCartItem')->name('update.cart');
Route::get('addcart/details','CartController@Cartdetails')->name('details.addcart');
Route::post('add/in/cart/','CartController@saveincart')->name('add.in.cart');
Route::get('user/checkout','CartController@usercheckout')->name('user.checkout');
Route::get('user/wishlistt','CartController@userwishlist')->name('user.wishlist');
Route::post('coupon/apply','CartController@couponapply')->name('coupon.apply');
Route::get('coupon/session/delete','CartController@deletecouponsession')->name('coupon.session.delete');

// final checkout
Route::get('final/checkout','CartController@finalcheckout')->name('final.checkout'); 

// paymeent
Route::post('user/paynow','paymentController@paynow')->name('paynow');
Route::post('user/stripe/charge','paymentController@stripecharge')->name('stripe.charge');

