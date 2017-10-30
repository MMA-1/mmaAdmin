<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mediatitle',150)->default('Unknown Media.');
            $table->string('slug',150)->unique();
            $table->text('description');
            $table->string('mediaurl');
            $table->integer('mediatype_id')->nullable()->unsigned();
            $table->integer('artist_id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('metatagvalue')->nullable();
            $table->string('metatagdescription')->nullable();
            $table->integer('addedby')->nullable()->unsigned();
            $table->integer('updatedby')->nullable()->unsigned();
            $table->boolean('isdeleted')->default(false);
            $table->integer('priority')->default(5);
            $table->integer('viewcount')->default(0);
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
        Schema::dropIfExists('media');
    }
}
