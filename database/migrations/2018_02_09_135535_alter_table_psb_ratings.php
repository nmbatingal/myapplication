<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePsbRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psb_ratings', function($table) {
            
            $table->integer('lineup_applicant_id')->after('id')->unsigned()->nullable();
            $table->foreign('lineup_applicant_id')->references('id')->on('applicant_lineup_groups')->onDelete('cascade');

            $table->integer('psb_id')->after('lineup_applicant_id')->unsigned()->nullable();
            $table->foreign('psb_id')->references('id')->on('psboard_members')->onDelete('cascade');

            $table->double('rate_education', 4, 2)->after('psb_id')->nullable();
            $table->double('rate_training', 4, 2)->after('rate_education')->nullable();
            $table->double('rate_experience', 4, 2)->after('rate_training')->nullable();
            $table->double('rate_character', 4, 2)->after('rate_experience')->nullable();
            $table->double('rate_comm_skills', 4, 2)->after('rate_character')->nullable();
            $table->double('rate_special_skills', 4, 2)->after('rate_comm_skills')->nullable();
            $table->double('rate_special_award', 4, 2)->after('rate_special_skills')->nullable();
            $table->double('rate_potential', 4, 2)->after('rate_special_award')->nullable();
            $table->text('remarks')->after('rate_potential')->nullable();
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
