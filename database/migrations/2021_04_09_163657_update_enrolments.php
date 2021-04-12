<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateEnrolments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (DB::connection()->getPDO()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql'){
            DB::statement("ALTER TABLE `enrolments` MODIFY COLUMN `state` ENUM('pending', 'validated')");
        } else {
            DB::statement("ALTER TABLE `enrolments` ALTER COLUMN `state` TYPE ENUM('pending', 'validated')");
        }
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
