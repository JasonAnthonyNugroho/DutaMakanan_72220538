<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_makanan','255');
            $table->string('asal_daerah','30');
            $table->string('gizi','255');
            $table->string('kategori','255');
            $table->string('expired','30');
            $table->string('deskripsi','255');
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
        Schema::dropIfExists('makanan');
    }
}
