<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUserEducationInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_user_education_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_user_id');
            $table->foreign('employee_user_id')->references('id')->on('employee_user');
            $table->unsignedInteger('education_status');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->tinyInteger('continues')->default(0);
            $table->tinyInteger('leave')->default(0);
            $table->unsignedInteger('diploma_grading_system')->nullable();
            $table->double('diploma_grade')->nullable();
            $table->string('university');
            $table->string('country')->nullable();
            $table->string('faculty');
            $table->string('department');
            $table->string('minor_department')->nullable();
            $table->string('minor_grade')->nullable();
            $table->string('major_faculty')->nullable();
            $table->string('major_department')->nullable();
            $table->string('major_grade')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('employee_user_education_informations');
    }
}
