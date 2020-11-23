<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->string('nm_pegawai');
            $table->string('nohp');
            $table->string('cabang');
            $table->string('departemen');
            $table->string('product');
            $table->string('satuan');
            $table->string('jumlah')
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
        Schema::dropIfExists('retur_forms');
    }
}
