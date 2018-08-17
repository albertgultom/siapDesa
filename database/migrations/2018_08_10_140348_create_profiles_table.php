<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 25);
            $table->string('name');
            $table->string('subdistrict');
            $table->string('district');
            $table->string('province');
            $table->string('zip_code')->default('-');
            $table->unsignedInteger('phone');
            $table->string('email')->default('-');
            $table->string('image_profile')->default('-');
            $table->string('headman')->default('-');
            $table->string('image_headman')->default('-');
            $table->text('description');
            $table->text('vision');
            $table->text('history');
            $table->string('image_structure')->default('-');
            $table->text('map');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
