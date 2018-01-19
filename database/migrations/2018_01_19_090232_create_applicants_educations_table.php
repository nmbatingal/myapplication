<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('program');
            $table->string('school');
            $table->date('year_graduated')->nullable();
            $table->integer('applicant_id')->unsigned()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('set null');
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
        Schema::dropIfExists('applicants_educations');
    }
}
