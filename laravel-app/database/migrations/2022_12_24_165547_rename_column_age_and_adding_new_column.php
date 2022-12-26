<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnAgeAndAddingNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('designers', function (Blueprint $table) {
            $table->renameColumn('surname','age');
            $table->integer('career_age');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designers', function (Blueprint $table) {

        });
    }
}
// $table->integer('career_age')  $table->dropColumn('career_age');
