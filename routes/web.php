<?php

use App\Http\Controllers\AdminController;
use App\Models\XToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use DB;
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/test/postman', function () {
    return view('postman');
});
Route::get('/account', function () {
    return view('customer-login');
})->middleware('login');
Route::get('/admin/dashboard', function () {
    $ad = session('utype');
    if ($ad != null && $ad == 1)
        return view('admin.admin_dash');
    else
        return redirect('/account');
});
Route::get('/admin/addseller', function () {
    $ad = session('utype');
    if ($ad != null && $ad == 1)
        return view('admin.admin_addseller');
    else
        return redirect('/account');
});
Route::get('/admin/addadmin', function () {
    $ad = session('utype');
    if ($ad != null && $ad == 1)
        return view('admin.admin_addadmin'); 
    else
        return redirect('/account');
});
Route::get('/admin/manage/sellers', [
    'uses' => 'App\Http\Controllers\AdminController@view_ManageSellers',
    'middleware' => 'App\Http\Middleware\AdminMiddleware:2'
]);
Route::get('/admin/manage/users', [
    'uses' => 'App\Http\Controllers\AdminController@view_ManageUsers',
    'middleware' => 'App\Http\Middleware\AdminMiddleware:4'
]);
Route::post('/admin/manage/sellers', [
    'uses' => 'App\Http\Controllers\AdminController@postHandle_ManageSellers',
    'middleware' => 'App\Http\Middleware\AdminMiddleware:0'
]);
Route::get('/admin/manage/admins', [
    'uses' => 'App\Http\Controllers\AdminController@view_ManageAdmins',
    'middleware' => 'App\Http\Middleware\AdminMiddleware:3'
]);
Route::post('/admin/manage/admins', [
    'uses' => 'App\Http\Controllers\AdminController@postHandle_ManageAdmins',
    'middleware' => 'App\Http\Middleware\AdminMiddleware:1'
]);
Route::get('/accountverfiy', [
    'uses' => 'App\Http\Controllers\VerfiyController@index'
]);
Route::post('/account', [
    'uses' => 'App\Http\Controllers\LoginController@postHandle'
]);
Route::get('testm', [
    'uses' => 'App\Http\Controllers\TestController@index'
]);
Route::get('/seller/dashboard', function () {
    return view('seller.seller_dash');
})->middleware('seller');
Route::get('/seller/addwarehouse', function () {
    return view('seller.seller_addwarehouse');
})->middleware('seller');
Route::get('/seller/addproduct', [
    'uses' => 'App\Http\Controllers\SellerController@view_AddProduct'
])->middleware('seller');
Route::post('/seller/manage/warehouses', [
    'uses' => 'App\Http\Controllers\SellerController@post_AddWarehouse'
])->middleware('seller');
Route::post('/seller/manage/products', [
    'uses' => 'App\Http\Controllers\SellerController@post_AddProduct'
])->middleware('seller');
Route::get('/seller/manage/products', function() {
    $w = DB::select('select products.*,warehouses.id as wid,warehouses.address from products,warehouses,warehouses_items where warehouses_items.product_id = products.id and warehouses_items.warehouse_id = warehouses.id and products.seller_id = ?', [session('uid')]);
    return view('seller.seller_mproducts', [
        'p_array' => $w
    ]);
})->middleware('seller');
Route::get('/seller/manage/warehouses', function() {
    $w = DB::select('select * from warehouses where seller_id = ?', [session('uid')]);
    return view('seller.seller_mwarehouses', [
        'w_array' => $w
    ]);
})->middleware('seller');
Route::get('/test111', [
    'uses' => 'App\Http\Controllers\MobileController@handle'
]);
Route::get('/test222', [
    'uses' => 'App\Http\Controllers\MobileController@handle2'
]);
Route::get('/web/login', [
    'uses' => 'App\Http\Controllers\LoginController@webLogin'
]);
Route::post('/mobile/api/json/login', [
    'uses' => 'App\Http\Controllers\LoginController@mobileLogin'
]);
Route::post('/mobile/api/json/signup', [
    'uses' => 'App\Http\Controllers\LoginController@mobileSignUp'
]);
Route::post('/mobile/api/json/me', function(Request $request)
{
    $user = XToken::user();
    return response()->json($user->basicInfo());
})->middleware('mobile.auth');