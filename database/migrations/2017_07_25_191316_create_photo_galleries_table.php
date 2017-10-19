<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150)->default('Gallery Image.');
            $table->string('slug',150)->unique();
            $table->string('imagepath',250);
            $table->boolean('approved')->default(false);
            $table->boolean('isdeleted')->default(false);
            $table->string('metatagvalue')->nullable();
            $table->string('metatagdescription')->nullable();
            $table->integer('priority')->default(5);
            $table->integer('viewcount')->default(10);
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
        Schema::dropIfExists('photo_gallaries');
    }
}
