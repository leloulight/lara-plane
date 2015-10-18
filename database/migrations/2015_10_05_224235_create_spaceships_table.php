<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaceships', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->string('name');
            $table->string('preview');
            $table->string('assignment');
            $table->boolean('real');
            $table->text('description');
            $table->string('meta-description');
            $table->string('country');
            $table->string('video');
            $table->integer('cost');
            $table->string('crew');
            $table->integer('speed');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
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
        Schema::drop('spaceships');
    }
}
