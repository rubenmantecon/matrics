<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 300);
            $table->date('start');
            $table->date('end');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id')->constrained();
            $table->string('code');
            $table->string('name');
            $table->string('description', 300);
            $table->integer('hours');
            $table->date('start');
            $table->date('end')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('mps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained();
            $table->string('code');
            $table->string('name');
            $table->string('description', 300);
            $table->timestamps();
        });

        Schema::create('ufs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mp_id')->constrained();
            $table->string('code');
            $table->string('name');
            $table->string('description', 300);
            $table->timestamps();
        });

        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('term_id')->constrained();
            $table->foreignId('career_id')->constrained();
            $table->string('dni');
            $table->enum('state', ['registered', 'unregistered']);
            $table->timestamps();
        });

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('uf_id')->constrained();
            $table->timestamps();
        });

        Schema::create('profile_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profile_reqs');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('req_enrols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('req_id');
            $table->foreign('req_id')->references('id')->on('requirements');
            $table->foreignId('enrolment_id')->constrained();
            $table->enum('state', ['registered', 'unregistered']);
            $table->timestamps();
        });

        Schema::create('enrolment_ufs', function (Blueprint $table) {
            $table->foreignId('uf_id')->constrained();
            $table->foreignId('enrolment_id')->constrained();
            $table->timestamps();
        });

        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->binary('data')->nullable();;
            $table->unsignedBigInteger('req_enrol_id');
            $table->foreign('req_enrol_id')->references('id')->on('req_enrols');
            $table->timestamps();
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('level');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
        Schema::dropIfExists('enrolment_ufs');
        Schema::dropIfExists('req_enrols');
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('profile_req');
        Schema::dropIfExists('records');
        Schema::dropIfExists('enrolments');
        Schema::dropIfExists('ufs');
        Schema::dropIfExists('mps');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('terms');
        //Schema::dropIfExists('users');
        Schema::dropIfExists('logs');
    }
}
