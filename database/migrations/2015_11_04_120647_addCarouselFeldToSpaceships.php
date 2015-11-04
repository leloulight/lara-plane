<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarouselFeldToSpaceships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spaceships', function (Blueprint $table) {
            $table->string('carousel', 1000)->after('preview');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spaceships', function (Blueprint $table) {
            $table->dropColumn('carousel');
        });
    }
}
