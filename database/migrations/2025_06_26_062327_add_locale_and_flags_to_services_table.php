<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaleAndFlagsToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('locale')->default('hy')->after('id');
            $table->boolean('show_on_hy')->default(false);
            $table->boolean('show_on_en')->default(false);
            $table->boolean('show_on_ru')->default(false);
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['locale', 'show_on_hy', 'show_on_en', 'show_on_ru']);
        });
    }
}
