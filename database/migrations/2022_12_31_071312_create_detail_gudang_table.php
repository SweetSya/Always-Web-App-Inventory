<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_gudang', function (Blueprint $table) {
            $table->string('order_id');
            $table->string('dg_brg_id');
            $table->string('dg_brg_nama');
            $table->string('dg_jumlah');
            $table->string('dg_brg_harga');
            $table->string('dg_subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_gudang');
    }
}
