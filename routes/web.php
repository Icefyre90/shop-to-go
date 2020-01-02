<?php


Route::group(['middleware' => ['auth', 'admin']], function() {

//user menager admin//
    Route::get('/admin', 'Admin@index')->name('admin_das');
    Route::get('/admin_userdatatable', 'Admin@user_data_table')->name('usersdatatable');

//product menager admin//
    Route::get('/admin_products_tables', 'Admin@product_data_table')->name('products_table');
    Route::get('/admin_products_edit/{id}', 'Admin@product_edit')->name('products.edit');
    Route::post('/admin_products_update/{id}', 'Admin@product_update')->name('products.update');
    Route::get('/admin_products_delete/{id}', 'Admin@product_delete')->name('products.delete');

//logo  for site//
    Route::get('/admin_logo', 'Admin@logo_display')->name('logo_display');
    Route::get('/admin_logo_edit/{id}', 'Admin@logo_edit')->name('logo.edit');
    Route::post('/admin_logo_update/{id}', 'Admin@logo_update')->name('logo.update');
    Route::get('/admin_logo_delete/{id}', 'Admin@logo_delete')->name('logo.delete');
//image for site//
    Route::get('/admin_site_img/{type}', 'Admin@img_display')->name('img_display');
    Route::get('/admin_img_edit/{type}/{id}', 'Admin@img_edit')->name('img.edit');
    Route::post('/admin_img_update/{type}/{id}', 'Admin@img_update')->name('img.update');
    Route::get('/admin_img_delete/{type}/{id}', 'Admin@img_delete')->name('img.delete');


});
//cart item //
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.removeItem');

Route::get('/adminko', function() {
    return view('admin/admin_index');
});
Route::get('/privacy', function() {
    return view('privacy');
});
Route::get('/view_cart', function() {
  if(Session::has('payment_info')){
                Session::forget('payment_info');
            }
    return view('view_cart');
})->name('view_cart');
Route::get('/aut', function() {
    return view('auth/login');
});
//buying checkout//
Route::get('/contact_information', 'HomeController@checkout')->name('checkout');
Route::get('/shipping_methodb', 'HomeController@shipp_back')->name('shippingb');
Route::post('/shipping_method', 'HomeController@shipping_method')->name('shipping_method');
Route::post('/payment_method', 'HomeController@payment_method')->name('payment_method');

Route::post('/checkout/stripepayment', 'CheckoutController@stripePayment')->name('stripepayment');




//product select admin//
Route::get('/product/{count}', 'ProductController@getIndex')->name('product.select');
Route::get('/product/{type}/{count}', 'ProductController@getIndextype')->name('product.select.type');
Route::get('/product_info/{id}/', 'ProductController@product_info')->name('product.info');

Route::get('/reg/{i}', 'HomeController@reg')->name('home_reg');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home_guest');
Route::get('/dropdown', 'HomeController@dropdown')->name('dropdown');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
