<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_invoice', function (Blueprint $table) {
            $table->string('invoice_id')->primary();
            $table->string('orde_rid')->index();
            $table->integer('totalbarang')->nullable();
            $table->double('totalharga')->nullable();
            $table->double('ongkir')->default(0);
            $table->string('status')->nullable()->default('Belum Dibayar');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_invoice');
    }
}
