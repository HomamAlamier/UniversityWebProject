<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\JsonResp;
class SellerController extends Controller
{
   public function post_AddWarehouse(Request $request){
      $address = $request->input('address');
      $openAt = $request->input('open_at');
      $closeAt = $request->input('close_at');
      $uid = session('uid');
      DB::insert('insert into warehouses (seller_id, address, open_at, close_at, gps_data) values (?, ?, ?, ?, "")', [$uid, $address, $openAt, $closeAt]);
      echo (new JsonResp(200, "Success !"))->json();
   }
   public function post_AddProduct(Request $request) {
      $name = $request->input('name');
      $desc = $request->input('desc');
      $count = $request->input('count');
      $price = $request->input('price');
      $wid = $request->input('warehouse_id');
      $uid = session('uid');
      $c = DB::select('select * from warehouses where seller_id = ? and id = ?', [$uid, $wid]);
      if (count($c) == 1){
         $mid = DB::table('media')->insertGetId([
            'media_value' => '', 'media_type' => 0
         ]);
         $pid = DB::table('products')->insertGetId([
            'name' => $name,
            'seller_id' => $uid,
            'description' => $desc,
            'image_media_id' => $mid,
            'available_count' => $count,
            'price' => $price,
            'average_rate' => 0,
            'discount_rate' => 0
         ]);
         DB::table('warehouses_items')->insertGetId([
            'warehouse_id' => $wid,
            'product_id' => $pid
         ]);
         echo (new JsonResp(200, "Success !"))->json();
      }else {
         echo (new JsonResp(400, "Invaild Request !"))->json();
      }
   }
   public function view_AddProduct(Request $request){
      $uid = session('uid');
      $w_array = DB::select('select * from warehouses where seller_id = ?', [$uid]);
      if (count($w_array) == 0){
         $has_warehouses = false;
      }
      else {
         $has_warehouses = true;
      }
      return view('seller.seller_addproduct', [
         'has_warehouses' => $has_warehouses,
         'w_array' => $w_array
      ]);
   }
}
