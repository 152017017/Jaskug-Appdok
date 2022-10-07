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
        Schema::table('t_dokumentasi', function (Blueprint $table) {
            $table->foreign('layanan_id', 'fk_layanan_to_dokumentasi')->references('id')->on('t_layanan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('bisnis_id', 'fk_bisnis_to_dokumentasi')->references('id')->on('t_bisnis')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('gruplayanan_id', 'fk_grup_to_dokumentasi')->references('id')->on('t_grup_layanan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('status_id', 'fk_status_to_dokumentasi')->references('id')->on('t_status')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('platform_id', 'fk_platform_to_dokumentasi')->references('id')->on('t_platform')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_dokumentasi', function (Blueprint $table) {
            $table->dropForeign('fk_layanan_to_dokumentasi');
            $table->dropForeign('fk_bisnis_to_dokumentasi');
            $table->dropForeign('fk_grup_to_dokumentasi');
            $table->dropForeign('fk_status_to_dokumentasi');
            $table->dropForeign('fk_platform_to_dokumentasi');
        });
    }
};
