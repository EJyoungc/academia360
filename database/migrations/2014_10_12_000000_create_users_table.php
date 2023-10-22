<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->default('active');
            $table->string('dob')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('academic_log_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('subject_id')->nullable();
            $table->longText('medical_issues')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
