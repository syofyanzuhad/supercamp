<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id_participant');
            $table->string('id_number')->unique();
            $table->string('name');
            $table->longText('image');
            $table->bigInteger('phone')->unique();
            $table->string('email')->unique();
            $table->string('city');
            $table->text('address');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->bigInteger('class')->unsigned();
            $table->enum('student_date', ['1', '2', '3', '4']);
            $table->enum('student_month', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->smallInteger('student_year');
            $table->enum('t_shirt', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->enum('status_user', ['1', '2', '3', '4', '5', '6'])->default('4');

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
        Schema::dropIfExists('participants');
    }
}
