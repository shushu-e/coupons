<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('store_id');
            $table->string('store_name');
            $table->string('store_url');
            $table->string('large_category');
            $table->string('small_category');
            $table->string('coupon_site');
            $table->string('coupon_name');
            $table->string('coupon_term');
            $table->date('coupon_expire');
            $table->string('coupon_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }
}
