<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::statement("ALTER TABLE `uploads` MODIFY COLUMN `data` MEDIUMBLOB ");
        if (DB::connection()->getPDO()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql'){
            DB::statement("ALTER TABLE `uploads` MODIFY COLUMN `data` MEDIUMBLOB ");
        } else {
            DB::statement("ALTER TABLE `uploads` ALTER COLUMN `date` TYPE BYTEA");
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
