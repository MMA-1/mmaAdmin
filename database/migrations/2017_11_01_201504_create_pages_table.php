<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150)->default('No Title Given.');
            $table->string('slug',150)->unique();
            $table->text('body');
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
        Schema::dropIfExists('pages');
    }
}
