<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedInteger('phone')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('vision')->nullable()->change();
            $table->text('history')->nullable()->change();
            $table->text('map')->nullable()->change();
            $table->text('mission')->nullable()->after('vision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('mission');
        });
    }
}
