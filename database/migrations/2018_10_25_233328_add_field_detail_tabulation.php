<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDetailTabulation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabulations_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tabulations_id');
            $table->string('name', 100);
            $table->string('title', 100);            
            $table->unsignedInteger('numeral');
            $table->string('identity', 50);
            $table->tinyInteger('comparative')->default(1);                                    
            $table->tinyInteger('status_available')->default(2);
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
        Schema::create('tabulations_detail', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('tabulations_id');
            $table->dropColumn('name', 100);
            $table->dropColumn('title', 100);            
            $table->dropColumn('numeral');
            $table->dropColumn('identity', 50);
            $table->dropColumn('comparative');                                    
            $table->dropColumn('status_available');
        });
    }
}
