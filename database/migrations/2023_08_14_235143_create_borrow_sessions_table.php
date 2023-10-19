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
        Schema::create('borrow_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('number_of_days');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('status')->default('borrowed');
            $table->string('librarian_id');
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
        Schema::dropIfExists('borrow_sessions');
    }
};
