<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFatehasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatehas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->text('description');
            $table->date('expiration');
            $table->integer('addedby')->nullable()->unsigned();
            $table->integer('updatedby')->nullable()->unsigned();
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
        Schema::dropIfExists('fatehas');
    }
}
