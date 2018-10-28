<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTabulation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabulations', function (Blueprint $table) {
            $table->tinyInteger('status_available')->default(2);
            $table->tinyInteger('comparative')->default(0);                        
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
        Schema::table('tabulations', function (Blueprint $table) {
            $table->dropColumn('status_available');
            $table->dropColumn('comparative');            
        });        
    }
}
