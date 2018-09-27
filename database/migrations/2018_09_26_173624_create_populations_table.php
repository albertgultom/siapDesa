<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 16)->unique()->nullable();
            $table->string('name');
            $table->string('gender', 1);
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('bloodtype', 3)->default('-');
            $table->string('religion');
            $table->string('status');
            $table->unsignedInteger('education_id');
            $table->unsignedInteger('occupation_id');
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
        Schema::dropIfExists('populations');
    }
}
