<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMoraleSurveyNotificationAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('morale_survey_notifications', function (Blueprint $table) {
            $table->integer('div_id')->unsigned()->after('user_id');
            $table->unique(['sem_id', 'user_id', 'div_id']);
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
