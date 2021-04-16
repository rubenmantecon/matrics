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
            $table->integer('postal_code');
            $table->string('phone_number');
            $table->string('emergency_number');
            $table->string('tutor_1');
            $table->string('tutor_1_dni');
            $table->string('tutor_2');
            $table->string('tutor_2_dni');
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
