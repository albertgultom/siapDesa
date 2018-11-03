<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTabulationFLAGDECIMAL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabulations', function (Blueprint $table) {
            $table->tinyInteger('flag_decimal')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabulations', function (Blueprint $table) {
            $table->dropColumn('flag_decimal');
        });
    }
}
