<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstTanamanPangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_tanaman_pangan', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->integer('fk_jenis_tanaman_pangan');
            $table->decimal('luas_panen',17,2);  
            $table->decimal('produktifitas',17,2);  
            $table->decimal('jumlah_produksi',17,2); 
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
        Schema::dropIfExists('mst_tanaman_pangan');
    }
}
