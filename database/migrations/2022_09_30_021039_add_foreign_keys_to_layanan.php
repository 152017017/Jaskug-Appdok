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
        Schema::table('t_layanan', function (Blueprint $table) {
            $table->foreign('gruplayanan_id', 'fk_grup_to_layanan')->references('id')->on('t_grup_layanan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_layanan', function (Blueprint $table) {
            $table->dropForeign('fk_grup_to_layanan');
        });
    }
};
