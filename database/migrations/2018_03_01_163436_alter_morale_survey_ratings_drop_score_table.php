<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMoraleSurveyRatingsDropScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('morale_survey_ratings', function (Blueprint $table) {
            $table->dropColumn('score');
            $table->boolean('r_dn')->nullable()->after('question_id');
            $table->boolean('r_n')->nullable()->after('r_dn');
            $table->boolean('r_ns')->nullable()->after('r_n');
            $table->boolean('r_y')->nullable()->after('r_ns');
            $table->boolean('r_dy')->nullable()->after('r_y');
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
