<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaleAndFlagsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('locale')->default('hy')->after('id');
            $table->boolean('show_on_hy')->default(false);
            $table->boolean('show_on_en')->default(false);
            $table->boolean('show_on_ru')->default(false);
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['locale','show_on_hy','show_on_en','show_on_ru']);
        });
    }
}
