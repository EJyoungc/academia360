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
        Schema::create('exam_time_tables', function (Blueprint $table) {
            $table->id();
            $table->string('hours');
            $table->string('min');
            $table->date('date');
            $table->integer('term_id');
            $table->integer('subject_id');
            $table->integer('level_id');
            $table->string('start_time');
            $table->integer('paper_id');
            $table->string('status')->default('active');

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
        Schema::dropIfExists('exam_time_tables');
    }
};
