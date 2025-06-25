<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaleAndFlagsToAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('locale')->default('hy')->after('id');
            $table->boolean('show_on_hy')->default(false);
            $table->boolean('show_on_en')->default(false);
            $table->boolean('show_on_ru')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn(['locale', 'show_on_hy', 'show_on_en', 'show_on_ru']);
        });
    }
}
