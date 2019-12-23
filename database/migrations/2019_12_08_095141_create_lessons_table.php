<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subject')->unsigned();
            $table->integer('quota')->default('36');
            $table->bigInteger('class_wave')->nullable()->unsigned();
            $table->bigInteger('class_date')->unsigned();
            $table->bigInteger('class_month')->unsigned();
            $table->smallInteger('class_year');
            $table->bigInteger('class_duration')->unsigned();
            $table->bigInteger('status_lesson')->default('1')->unsigned();
            $table->foreign('class_date')->references('id_date')->on('date');
            $table->foreign('class_month')->references('id_month')->on('month');
            $table->foreign('class_duration')->references('id_duration')->on('duration');
            $table->foreign('status_lesson')->references('id_status')->on('status');
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
        Schema::dropIfExists('lessons');
    }
}
