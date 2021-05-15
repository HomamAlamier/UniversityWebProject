<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

class Database10 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('', function(Blueprint $table){ });



        // Tables 
        // ------- users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->timestamp('created_at');
            $table->string('email');
            $table->string('address');
            $table->string('password');
            $table->tinyInteger('user_type')->default(0);
            $table->string('p_weights')->default('0');
            $table->string('verfiy_token');
            $table->timestamp('token_at');
            $table->boolean('verfied');
            $table->string('gps_data')->default('');
            $table->timestamp('last_login');
            $table->string('last_login_ip')->default('');
            $table->unsignedBigInteger('image_media_id');
            $table->string('description')->default('');
            $table->unsignedBigInteger('added_by');
        });
        // ------- admins
        Schema::create('admins', function (Blueprint $table){
            $table->unsignedBigInteger('id');
            $table->string('permissions');
        });
        // ------- sellers
        Schema::create('sellers', function (Blueprint $table){
            $table->unsignedBigInteger('id');
            $table->string('main_address');
            $table->string('company_name');
            $table->timestamp('started_at');
            $table->float('average_rate');
        });
        // ------- product_seller_info
        Schema::create('product_seller_info', function(Blueprint $table){
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('purchased_at');
            $table->integer('purchased_count');
            $table->string('address_info');
        });
        // ------- warehouses
        Schema::create('warehouses', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('address');
            $table->string('gps_data');
            $table->timestamp('open_at');
            $table->timestamp('close_at');
        });
        // ------- warehouses_items    
        Schema::create('warehouses_items', function(Blueprint $table){
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('product_id');
        });
        // ------- products
        Schema::create('products', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('image_media_id');
            $table->integer('available_count');
            $table->decimal('price');
            $table->float('average_rate');
            $table->float('discount_rate');
        });
        // ------- media
        Schema::create('media', function(Blueprint $table){
            $table->id('media_id');
            $table->string('media_value');
            $table->tinyInteger('media_type');
        });
        // ------- offers
        Schema::create('offers', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('offer_description');
            $table->decimal('offer_price');
        });
        // ------- comments
        Schema::create('comments', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('comment_value');
        });
        // ------- carts
        Schema::create('carts', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('product_count');
        });
        // ------- checkouts_items
        Schema::create('checkouts_items', function(Blueprint $table){
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('count');
        });
        // ------- checkouts
        Schema::create('checkouts', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at');
            $table->string('delivery_address');
            $table->decimal('total_price');
        });

        Schema::create('tokenSessions', function(Blueprint $table){
            $table->string('devicename');
            $table->string('token');
            $table->string('session_id');
            $table->dateTime("at");
            $table->dateTime("expire");
        });
        ///// Foreign's
        Schema::table('users', function(Blueprint $table){
            $table->foreign('image_media_id')->references('media_id')->on('media');
        });
        Schema::table('admins', function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });
        Schema::table('sellers', function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });
        Schema::table('product_seller_info', function(Blueprint $table){
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('warehouses', function(Blueprint $table){
            $table->foreign('seller_id')->references('id')->on('sellers');
        });
        Schema::table('warehouses_items', function(Blueprint $table){
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('products', function(Blueprint $table){
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('image_media_id')->references('media_id')->on('media');
        });
        Schema::table('media', function(Blueprint $table){

        });
        Schema::table('offers', function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('comments', function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });        
        Schema::table('carts', function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });        
        Schema::table('checkouts_items', function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('checkout_id')->references('id')->on('checkouts');
        });        
        Schema::table('checkouts', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        // default admin
        $mid = DB::table('media')->insertGetId([
            'media_value' => '', 
            'media_type' => 0
        ]);
        $uid = DB::table('users')->insertGetId( [
            'username' => 'Owner',
            'email' => 'owner@laravel.com',
            'address' => 'NoAddress',
            'password' => 'adminowner123',
            'created_at' => date("Y-m-d H:i:s"),
            'verfied' => true,
            'last_login' => date("Y-m-d H:i:s"),
            'image_media_id' => $mid,
            'added_by' => 0,
            'description' => '',
            'verfiy_token' => '',
            'user_type' => 0,
            'token_at' => date("Y-m-d H:i:s")
        ] );
        DB::table('admins')->insertGetId([
            'id' => $uid,
            'permissions' => 'PERM_ALL'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('product_seller_info');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('warehouses_items');
        Schema::dropIfExists('products');
        Schema::dropIfExists('media');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('checkouts_items');
        Schema::dropIfExists('checkouts');
    }
}
