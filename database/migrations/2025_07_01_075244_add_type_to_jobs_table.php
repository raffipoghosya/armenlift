<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('type')->nullable()->after('locale'); // կամ ->default('public') եթե ուզում ես որ լինի պարտադիր
        });
    }
    
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
    
}
