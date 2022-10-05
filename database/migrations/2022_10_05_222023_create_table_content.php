<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_content', function (Blueprint $table) {
            $table->id();
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('val3')->nullable();
            $table->string('val4')->nullable();
            $table->string('val5')->nullable();
            $table->string('val6')->nullable();
            $table->string('val7')->nullable();
            $table->string('val8')->nullable();
            $table->string('val9')->nullable();
            $table->string('val10')->nullable();
            $table->string('val11')->nullable();
            $table->string('val12')->nullable();
            $table->string('val13')->nullable();
            $table->string('val14')->nullable();
            $table->string('val15')->nullable();
            $table->string('val16')->nullable();
            $table->string('val17')->nullable();
            $table->string('val18')->nullable();
            $table->string('val19')->nullable();
            $table->string('val20')->nullable();
            $table->string('a1')->nullable();
            $table->string('a2')->nullable();
            $table->string('a3')->nullable();
            $table->string('a4')->nullable();
            $table->string('a5')->nullable();
            $table->string('a6')->nullable();
            $table->string('a7')->nullable();
            $table->string('a8')->nullable();
            $table->string('a9')->nullable();
            $table->string('a10')->nullable();
            $table->string('a11')->nullable();
            $table->string('a12')->nullable();
            $table->string('a13')->nullable();
            $table->string('a14')->nullable();
            $table->string('a15')->nullable();
            $table->string('a16')->nullable();
            $table->string('a17')->nullable();
            $table->string('a18')->nullable();
            $table->string('a19')->nullable();
            $table->string('a20')->nullable();
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
        Schema::dropIfExists('table_content');
    }
}
