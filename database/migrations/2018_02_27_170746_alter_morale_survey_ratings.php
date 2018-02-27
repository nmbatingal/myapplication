<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMoraleSurveyRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('morale_survey_ratings', function (Blueprint $table) {
            $table->integer('semestral_id')->unsigned()->nullable()->after('score');
            $table->foreign('semestral_id')->references('id')->on('morale_survey_semestrals')->onDelete('cascade');
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
