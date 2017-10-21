<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('albumtitle',100)->default('Unknown Album.');
            $table->string('slug',100)->unique();
            $table->string('year',20);
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('subcategory_id')->nullable()->unsigned();
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
        Schema::dropIfExists('albums');
    }
}
