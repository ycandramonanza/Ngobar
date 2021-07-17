<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mentor_id')->unsigned();
            $table->string('kode_kelas');
            $table->string('status_kelas');
            $table->string('nama_kelas');
            $table->text('desc');
            $table->integer('harga')->nullable();
            $table->integer('harga_diskon')->nullable();
            $table->string('tools');
            $table->string('image');
            $table->string('progres');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
