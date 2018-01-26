<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionHiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_hirings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->char('acronym', 10)->nullable();
            $table->integer('sal_grade');
            $table->text('item_no')->nullable();
            $table->text('publication_no')->nullable();
            $table->text('education_reqs')->nullable();
            $table->text('experience_reqs')->nullable();
            $table->text('training_reqs')->nullable();
            $table->text('eligibilities')->nullable();
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
        Schema::dropIfExists('position_hirings');
    }
}
