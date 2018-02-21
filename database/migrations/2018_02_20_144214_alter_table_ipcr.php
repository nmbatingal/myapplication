<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableIpcr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ipcrs', function ($table) {
            $table->char('year', 4)->after('title')->nullable();
            $table->integer('month_from')->after('year')->unsigned()->nullable();
            $table->foreign('month_from')->references('id')->on('table_month')->onDelete('set null');
            $table->integer('month_to')->after('month_from')->unsigned()->nullable();
            $table->foreign('month_to')->references('id')->on('table_month')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
