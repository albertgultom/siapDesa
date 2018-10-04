<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabulations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('criteria_id');
            $table->string('name', 100);
            $table->unsignedInteger('numeral');
            $table->string('identity', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabulations');
    }
}
