<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_user_id');
            $table->string('title');
            $table->string('location');
            $table->string('country');
            $table->string('district')->nullable();
            $table->string('sector');
            $table->string('department');
            $table->string('way_of_working');
            $table->integer('period')->default(30);
            $table->string('working_type');
            $table->string('position_level')->nullable();
            $table->string('education_level');
            $table->string('disability');
            $table->string('driving_license');
            $table->string('experienced');

            $table->foreign('employer_user_id')->references('id')->on('employer_user');
            $table->tinyInteger('featured')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}
