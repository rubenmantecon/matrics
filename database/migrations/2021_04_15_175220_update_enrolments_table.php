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
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('address');
            $table->string('population');
            $table->integer('postal_code');
            $table->integer('phone_number');
            $table->integer('emergency_number');
            $table->string('father_name');
            $table->string('father_dni');
            $table->string('mother_name');
            $table->string('mother_dni');
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
