<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrolments', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone_number');
            $table->string('emergency_number');
            $table->string('tutor_1')->nullable();
            $table->string('tutor_1_dni')->nullable();
            $table->string('tutor_2')->nullable();
            $table->string('tutor_2_dni')->nullable();
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
