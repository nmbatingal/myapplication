<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantEligibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_eligibilities', function (Blueprint $table) {
            $table->increments('id');
            $table->char('license_number', 20)->nullable();
            $table->string('title');
            $table->decimal('rating', 10, 2)->nullable();
            $table->date('exam_date')->nullable();
            $table->integer('applicant_id')->unsigned()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
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
        Schema::dropIfExists('applicant_eligibilities');
    }
}
