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
        Schema::create('t_dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->index('fk_layanan_to_dokumentasi');
            $table->foreignId('bisnis_id')->index('fk_bisnis_to_dokumentasi');
            $table->foreignId('gruplayanan_id')->index('fk_grup_to_dokumentasi');
            $table->foreignId('status_id')->index('fk_status_to_dokumentasi');
            $table->foreignId('platform_id')->index('fk_platform_to_dokumentasi');
            $table->string('lampiran')->nullable();
            $table->date('tanggal');
            $table->string('nomor')->unique();
            $table->text('perihal');
            $table->text('deskripsi');
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
        Schema::dropIfExists('t_dokumentasi');
    }
};
