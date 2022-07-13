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
        Schema::table('specialites', function (Blueprint $table) {
            $table->bigInteger('traiteur_id')->unsigned();
            $table->foreign('traiteur_id')
                ->references('id')
                ->on('traiteur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specialites', function (Blueprint $table) {
            //
        });
    }
};
