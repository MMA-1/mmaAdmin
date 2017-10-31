<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artistname',100)->default('Unknown Artist.');
            $table->string('slug',100)->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('contact',20)->nullable()->default('000000000000');
            $table->boolean('isdeleted')->default(false);
            $table->integer('priority')->default(5);
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
        Schema::dropIfExists('artists');
    }
}
