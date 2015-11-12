<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailImageOnce extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spaceships', function (Blueprint $table) {
            $table->string('detail_image')->after('preview');
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
            $table->dropColumn('detail_image');
        });
    }
}
