<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUserWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_user_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_user_id');
            $table->foreign('employee_user_id')->references('id')->on('employee_user');
            $table->string('company_name');
            $table->string('position');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->tinyInteger('still_working')->default(0);
            $table->unsignedInteger('company_sector');
            $table->unsignedInteger('business_area')->nullable();
            $table->unsignedInteger('working_type');
            $table->unsignedInteger('country')->nullable();
            $table->unsignedInteger('city')->nullable();
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('employee_user_work_experiences');
    }
}
