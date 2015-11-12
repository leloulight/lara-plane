<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDetailImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spaceships', function (Blueprint $table) {
            $table->dropColumn('detail-image');
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
            $table->dropColumn('detail-image');
        });
    }
}
