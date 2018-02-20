<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpcrsObjectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipcrs_objective', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ipcr_id')->unsigned();
            $table->foreign('ipcr_id')->references('id')->on('ipcrs')->onDelete('cascade');
            $table->boolean('is_title');
            $table->text('objective');
            $table->text('key_summary')->nullable();
            $table->decimal('target', 8, 2)->default(0)->nullable();
            $table->integer('parent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipcrs_objective');
    }
}
