<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUserContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_user_contact_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('degree')->nullable();
            $table->string('phone_number');
            $table->string('phone_number_alternative')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('web_page')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_user_id')->references('id')->on('employee_user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_user_contact_information');
    }
}
