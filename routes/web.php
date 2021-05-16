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
Route::get('/login', function () {
    return view('customer-login');
})->middleware('web.auth');
Route::get('/web/login', [
    'uses' => 'App\Http\Controllers\LoginController@webLogin'
]);
Route::post('/login', [
    'uses' => 'App\Http\Controllers\LoginController@webPost'
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