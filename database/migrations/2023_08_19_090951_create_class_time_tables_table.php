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
        Schema::create('class_time_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('classroom_id');
            // $table->string('start');
            // $table->string('end');
            // $table->integer('slot_id');
            // $table->string('day');
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
        Schema::dropIfExists('class_time_tables');
    }
};
