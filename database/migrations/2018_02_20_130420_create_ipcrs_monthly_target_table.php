<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpcrsMonthlyTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipcrs_monthly_target', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obj_id')->unsigned();
            $table->foreign('obj_id')->references('id')->on('ipcrs_objective')->onDelete('cascade');
            $table->integer('month_id')->unsigned()->nullable();
            $table->foreign('month_id')->references('id')->on('table_month')->onDelete('set null');
            $table->decimal('target', 8, 2)->default(0);
            $table->decimal('value', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipcrs_monthly_target');
    }
}
