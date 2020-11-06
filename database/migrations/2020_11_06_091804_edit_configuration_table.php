<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuration', function (Blueprint $table) {
            $table->dropColumn('masuk');
            $table->dropColumn('keluar');

            $table->integer('jam_masuk');
            $table->integer('jam_keluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuration', function (Blueprint $table) {
            //
        });
    }
}
