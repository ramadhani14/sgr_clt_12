<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusNelayan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_nelayan', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->integer('pemilik_rtp');
            $table->integer('buruh_rbtp');
            $table->integer('fk_provinsi');
            $table->integer('fk_kabupaten');
            $table->integer('fk_kecamatan');
            $table->bigInteger('fk_desa');
            $table->mediumText('fk_mst_petani');
            $table->mediumText('ket')->nullable();
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
        Schema::dropIfExists('status_nelayan');
    }
}
