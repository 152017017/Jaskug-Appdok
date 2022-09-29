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
        Schema::create('t_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grup')->nullable('true');
            $table->foreign('id_grup')->references('id')->on('t_grup_layanan')->onDelete('cascade');
            $table->string('deskripsi', 255);
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
        Schema::dropIfExists('t_layanan');
    }
};
