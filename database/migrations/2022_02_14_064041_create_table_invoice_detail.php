<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvoiceDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->index();
            $table->string('order_id')->index();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('product_details_id')->unsigned();
            $table->integer('qty')->nullable();
            $table->double('hargasatuan')->nullable();
            $table->double('discount')->nullable();
            $table->double('totalharga')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('invoice_id')->references('invoice_id')->on('table_invoice')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_details_id')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_invoice_detail');
    }
}
