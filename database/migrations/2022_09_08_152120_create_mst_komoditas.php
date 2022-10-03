<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstKomoditas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_komoditas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('komoditas');
            $table->string('singkatan');
            $table->integer('status_master')->comment = '0 = Tidak Ada ; 1 = Ada';
            $table->integer('status_jenis')->comment = '0 = Tidak Ada ; 1 = Ada';
            $table->integer('created_by');
            $table->datetime('created_at');
            $table->integer('updated_by')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_komoditas');
    }
}
