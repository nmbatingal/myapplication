<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantLineupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_lineups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id')->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('position_hirings')->onDelete('set null');
            $table->date('date_interview')->nullable();
            $table->integer('status')->default(1);
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('applicant_lineups');
    }
}
