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
            // $table->foreignId('bisnis_id')->nullable()->index('fk_bisnis_to_grup');
            $table->unsignedBigInteger('bisnis_id');
            $table->foreign('bisnis_id')->nullable()->references('id')->on('t_bisnis');
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
        Schema::dropIfExists('t_grup_layanan');
    }
};
