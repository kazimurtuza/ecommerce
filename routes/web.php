<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
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