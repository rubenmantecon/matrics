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
            $table->integer('postal_code', 9);
            $table->integer('phone_number', 15);
            $table->integer('emergency_number', 15);
            $table->string('father_name')->nullable();
            $table->string('father_dni')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_dni')->nullable();
        });
        //

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
