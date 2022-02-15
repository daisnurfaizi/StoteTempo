<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpp', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_detail_id')->unsigned();
            $table->double('Nilai_hpp')->nullable();
            $table->double('margin_internal')->nullable();
            $table->double('margin_eksternal')->nullable();
            $table->double('hpp_internal')->nullable();
            $table->double('hpp_eksternal')->nullable();
            $table->timestamps();
            $table->foreign('product_detail_id')->references('id')->on('product_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hpp');
    }
}
