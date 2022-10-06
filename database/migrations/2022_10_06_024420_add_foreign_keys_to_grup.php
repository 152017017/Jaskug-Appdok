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
        Schema::table('t_grup_layanan', function (Blueprint $table) {
            $table->foreign('bisnis_id', 'fk_bisnis_to_group')->references('id')->on('t_bisnis')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_grup_layanan', function (Blueprint $table) {
            $table->dropForeign('fk_bisnis_to_group');
        });
    }
};
