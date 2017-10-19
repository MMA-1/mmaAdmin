<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150)->default('No Title Given.');
            $table->text('body');
            $table->string('slug',150)->unique();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('subcategory_id')->nullable()->unsigned();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
