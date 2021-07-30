<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Thay doi ngon ngu
Route::get('lang/{locale}',function($locale){
if(! in_array($locale,['en','vi','cn'])){
	abort(404);

   }
   session()->put('locale',$locale);
   return redirect()->back();
});

//Frontend 
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');
Route::get('/404','HomeController@error_page');

//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::post('/quickview','ProductController@quickview');
Route::get('/chi-tiet/{product_slug}','ProductController@details_product');
Route::get('/tag/{product_tag}','ProductController@tag');
Route::post('/insert-rating','ProductController@insert_rating');
Route::post('/uploads-ckeditor','ProductController@ckeditor_image');
Route::get('/file-browser','ProductController@file_browser');
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');
Route::get('/comment','ProductController@list_comment');
Route::post('/allow-comment','ProductController@allow_comment');
Route::post('/reply-comment','ProductController@reply_comment');


//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');
//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::post('/filter-by-date','AdminController@filter_by_date')->middleware('admin.roles');
Route::post('/dashboard-filter','AdminController@dashboard_filter')->middleware('admin.roles');
Route::post('/days-order','AdminController@days_order')->middleware('admin.roles');
Route::get('/show-thong-ke','AdminController@show_thong_ke')->middleware('admin.roles');
//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product')->middleware('author.roles');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product')->middleware('author.roles');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product')->middleware('author.roles');
Route::get('/all-category-product','CategoryProduct@all_category_product')->middleware('author.roles');

Route::post('/export-csv','CategoryProduct@export_csv')->middleware('author.roles');
Route::post('/import-csv','CategoryProduct@import_csv')->middleware('author.roles');


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product')->middleware('author.roles');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product')->middleware('author.roles');
Route::post('/product-tabs','CategoryProduct@product_tabs');
//Send Mail 
Route::get('/send-mail','HomeController@send_mail');
Route::get('/send-coupon-vip/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@send_coupon_vip');
Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@send_coupon');
Route::get('/mail-example','MailController@mail_example');
Route::get('/quen-mat-khau','MailController@quen_mat_khau');
Route::post('/recover-pass','MailController@recover_pass');
Route::get('/update-new-pass','MailController@update_new_pass');
Route::post('/reset-new-pass','MailController@reset_new_pass');
//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product')->middleware('author.roles');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product')->middleware('author.roles');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product')->middleware('author.roles');
Route::get('/all-brand-product','BrandProduct@all_brand_product')->middleware('author.roles');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product')->middleware('author.roles');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product')->middleware('author.roles');

Route::post('/save-brand-product','BrandProduct@save_brand_product')->middleware('author.roles');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product')->middleware('author.roles');
//Category Post

Route::get('/add-category-post','CategoryPost@add_category_post')->middleware('user.roles');
Route::get('/all-category-post','CategoryPost@all_category_post')->middleware('user.roles');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post')->middleware('user.roles');

Route::post('/save-category-post','CategoryPost@save_category_post')->middleware('user.roles');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post')->middleware('user.roles');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post')->middleware('user.roles');
//POst

Route::get('/add-post','PostController@add_post')->middleware('user.roles');
Route::get('/all-post','PostController@all_post')->middleware('user.roles');
Route::get('/delete-post/{post_id}','PostController@delete_post')->middleware('user.roles');
Route::get('/edit-post/{post_id}','PostController@edit_post')->middleware('user.roles');
Route::post('/save-post','PostController@save_post')->middleware('user.roles');
Route::post('/update-post/{post_id}','PostController@update_post')->middleware('user.roles');

//Product
Route::get('/add-product','ProductController@add_product')->middleware('author.roles');
Route::get('/edit-product/{product_id}','ProductController@edit_product')->middleware('author.roles');


Route::get('/delete-product/{product_id}','ProductController@delete_product')->middleware('author.roles');
Route::get('/all-product','ProductController@all_product')->middleware('author.roles');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product')->middleware('author.roles');
Route::get('/active-product/{product_id}','ProductController@active_product')->middleware('author.roles');

Route::post('/save-product','ProductController@save_product')->middleware('author.roles');
Route::post('/update-product/{product_id}','ProductController@update_product')->middleware('author.roles');

//Coupon
Route::post('/check-coupon','CartController@check_coupon');

Route::get('/unset-coupon','CouponController@unset_coupon')->middleware('author.roles');
Route::get('/insert-coupon','CouponController@insert_coupon')->middleware('author.roles');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon')->middleware('author.roles');
Route::get('/list-coupon','CouponController@list_coupon')->middleware('author.roles');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code')->middleware('author.roles');

//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');
Route::get('/show-cart','CartController@show_cart_menu');
Route::get('hover-cart','CartController@hover_cart');
//Checkout
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');

Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Order

Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order')->middleware('author.roles');
Route::get('/view-order/{order_code}','OrderController@view_order')->middleware('author.roles');
Route::post('/update-order-qty','OrderController@update_order_qty')->middleware('author.roles');
Route::post('/update-qty','OrderController@update_qty')->middleware('author.roles');
Route::get('/history','OrderController@history');
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');
Route::post('/huy-don-hang','OrderController@huy_don_hang');

//Delivery
Route::get('/delivery','DeliveryController@delivery')->middleware('author.roles');
Route::post('/select-delivery','DeliveryController@select_delivery')->middleware('author.roles');
Route::post('/insert-delivery','DeliveryController@insert_delivery')->middleware('author.roles');
Route::post('/select-feeship','DeliveryController@select_feeship')->middleware('author.roles');
Route::post('/update-delivery','DeliveryController@update_delivery')->middleware('author.roles');

//Banner
Route::get('/manage-slider','SliderController@manage_slider')->middleware('user.roles');
Route::get('/add-slider','SliderController@add_slider')->middleware('user.roles');
Route::post('/insert-slider','SliderController@insert_slider')->middleware('user.roles');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide')->middleware('user.roles');
Route::get('/active-slide/{slide_id}','SliderController@active_slide')->middleware('user.roles');

//Authentication rols
Route::get('/register-auth','AuthController@register_auth');
Route::post('/register','AuthController@register');
Route::get('/login-auth','AuthController@login_auth');
Route::get('/logout-auth','AuthController@logout_auth');
Route::post('/login','AuthController@login');

//User
Route::get('users','UserController@index')->middleware('admin.roles');
Route::get('add-users','UserController@add_users')->middleware('admin.roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('admin.roles');
Route::post('store-users','UserController@store_users');
Route::post('assign-roles','UserController@assign_roles')->middleware('admin.roles');

Route::get('impersonate/{admin_id}','UserController@impersonate')->middleware('admin.roles');
Route::get('impersonate-destroy','UserController@impersonate_destroy');

//Gallery
Route::get('add-gallery/{product_id}','GalleryController@add_gallery')->middleware('author.roles');
Route::post('select-gallery','GalleryController@select_gallery')->middleware('author.roles');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery')->middleware('author.roles');
Route::post('update-gallery-name','GalleryController@update_gallery_name')->middleware('author.roles');
Route::post('delete-gallery','GalleryController@delete_gallery')->middleware('author.roles');
Route::post('update-gallery','GalleryController@update_gallery')->middleware('author.roles');

//Video
Route::get('video','VideoController@video')->middleware('user.roles');
Route::get('video-shop','VideoController@video_shop');
Route::post('select-video','VideoController@select_video')->middleware('user.roles');
Route::post('insert-video','VideoController@insert_video')->middleware('user.roles');
Route::post('update-video','VideoController@update_video')->middleware('user.roles');
Route::post('delete-video','VideoController@delete_video')->middleware('user.roles');
Route::post('update-video-image','VideoController@update_video_image')->middleware('user.roles');
Route::post('watch-video','VideoController@watch_video')->middleware('user.roles');