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
            $table->decimal('numeral_2', 10, 2)->default(0);            
            $table->string('identity_2', 50)->default(0);       
            $table->tinyInteger('status_available_2')->default(2);      
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
            $table->dropColumn('numeral_2');            
            $table->dropColumn('identity_2');            
            $table->dropColumn('status_available_2');            
        });        
    }
}
