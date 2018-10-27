<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldCriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criterias', function (Blueprint $table) {
            $table->tinyInteger('tree')->default(0);
            $table->tinyInteger('comparative')->default(1);            
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
        //
        Schema::table('criterias', function (Blueprint $table) {
            $table->dropColumn('tree');
            $table->dropColumn('comparative');            
        });        
    }
}
