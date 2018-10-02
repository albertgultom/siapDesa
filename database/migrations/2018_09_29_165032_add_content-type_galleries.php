<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentTypeGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('content')->after('name');
        });

        Schema::table('contents', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->string('video')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
}
