<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiars', function (Blueprint $table) {
            $table->unsignedInteger('karkel_id');
            $table->unsignedInteger('population_id');
            $table->unsignedTinyInteger('shdrt');
            $table->string('shdk');
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
        Schema::dropIfExists('familiars');
    }
}
