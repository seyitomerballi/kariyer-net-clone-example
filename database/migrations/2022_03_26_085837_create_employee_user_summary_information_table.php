<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUserSummaryInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_user_summary_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_user_id');
            $table->foreign('employee_user_id')->references('id')->on('employee_user');
            $table->tinyInteger('gender');
            $table->string('driving_licenses');
            $table->string('nationality');
            $table->string('net salary expectation')->nullable();
            $table->unsignedInteger('military_status');
            $table->tinyInteger('disabled_status')->default(0);
            $table->unsignedInteger('ds_category')->nullable();
            $table->unsignedInteger('ds_percent')->nullable();
            $table->text('ds_desc')->nullable();
            $table->unsignedInteger('disabled_health_report')->default(0);
            $table->unsignedInteger('chronic_ailment')->default(0);
            $table->text('chronic_ailment_desc')->nullable();
            $table->unsignedInteger('regular_medication')->default(0);
            $table->text('regular_medication_desc')->nullable();
            $table->unsignedInteger('loss_of_consciousness')->default(0);
            $table->text('loss_of_consciousness_desc')->nullable();
            $table->unsignedInteger('contagious_disease')->default(0);
            $table->text('contagious_disease_desc')->nullable();
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
        Schema::dropIfExists('employee_user_summary_information');
    }
}
