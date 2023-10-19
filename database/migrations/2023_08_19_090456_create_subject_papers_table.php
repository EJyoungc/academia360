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
        Schema::create('subject_papers', function (Blueprint $table) {
            $table->id();
            $table->string('paper');
            $table->string('level_id');
            $table->integer('subject_id');
            $table->integer('classroom_type_id');
            $table->integer('mark');
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
        Schema::dropIfExists('subject_papers');
    }
};
