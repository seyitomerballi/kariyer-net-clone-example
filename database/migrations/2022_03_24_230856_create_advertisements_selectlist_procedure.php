<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsSelectlistProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `AdvertisementSelectList`;
        CREATE PROCEDURE `AdvertisementSelectList`
        (
        INOUT prm_id INT,
        IN prm_employer_user_id INT,
        IN prm_title VARCHAR(255),
        IN prm_location VARCHAR(255),
        IN prm_country VARCHAR(255),
        IN prm_district VARCHAR(255),
        IN prm_sector VARCHAR(255),
        IN prm_department VARCHAR(255),
        IN prm_way_of_working VARCHAR(255),
        IN prm_period INT,
        IN prm_working_type VARCHAR(255),
        IN prm_position_level VARCHAR(255),
        IN prm_education_level VARCHAR(255),
        IN prm_disability VARCHAR(255),
        IN prm_driving_license VARCHAR(255),
        IN prm_experienced VARCHAR(255),
        IN prm_featured TINYINT,
        IN prm_on_publication TINYINT,
        IN prm_description VARCHAR(255)
        )
        BEGIN
         SELECT 
         * 
         FROM `advertisements` as a
         WHERE
         CASE
         (WHEN prm_id IF IS NULL THEN 1=1 ELSE a.`id` = prm_id);
         END CASE; 
        END
        ";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements_selectlist_procedure');
    }
}
