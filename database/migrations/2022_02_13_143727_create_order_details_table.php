<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->index();
            // $table->bigInteger('product_id')->unsigned();
            // $table->bigInteger('category_id')->unsigned();
            // $table->bigInteger('vendor_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->bigInteger('product_detail_id')->unsigned();
            $table->foreign('product_detail_id')->references('id')->on('product_details');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->softDeletes();
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
        Schema::dropIfExists('order_details');
    }
}
