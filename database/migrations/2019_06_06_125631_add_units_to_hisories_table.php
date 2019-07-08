<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitsToHisoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histories', function (Blueprint $table) {
            //
            $table->integer('unit_from_id')->unsigned()->index();
            $table->foreign('unit_from_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('unit_to_id')->unsigned()->index();
            $table->foreign('unit_to_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histories', function (Blueprint $table) {
            //
            $table->dropForeign('histories_unit_from_id_foreign');
            $table->dropColumn('unit_from_id');
            $table->dropForeign('histories_unit_to_id_foreign');
            $table->dropColumn('unit_to_id');
        });
    }
}
