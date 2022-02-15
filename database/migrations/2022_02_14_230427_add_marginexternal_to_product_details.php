<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarginexternalToProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->double('margin_eksternal')->nullable()->default(0)->after('harga_jual');
            $table->double('harga_jual_eksternal')->nullable()->default(0)->after('margin_eksternal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropColumn('margin_eksternal');
            $table->dropColumn('harga_jual_eksternal');
        });
    }
}
