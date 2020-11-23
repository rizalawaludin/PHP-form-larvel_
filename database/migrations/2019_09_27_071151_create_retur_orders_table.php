<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fod_no');
            $table->string('kd_item');
            $table->string('item');
            $table->string('satuan');
            $table->string('jml_pesanan');
            $table->string('nm_pemesan');
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
        Schema::dropIfExists('retur_orders');
    }
}
