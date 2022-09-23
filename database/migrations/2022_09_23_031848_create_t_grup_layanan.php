<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_grup_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bisnis');
            $table->foreign('id_bisnis')->references('id')->on('t_bisnis')->onDelete('cascade');
            $table->string('deskripsi');
            $table->rememberToken();
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
        Schema::dropIfExists('t_grup_layanan');
    }
};
