<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firstteam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->unsignedBigInteger('position');
            $table->string('address')->nullable();
            $table->string('country');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Others'])->default('Male');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('prefered_foot')->nullable();
            $table->Integer('jersey_no')->nullable();
            $table->enum('team', ['Senior', 'Junior'])->default('Senior');
            $table->string('image')->nullable();
            $table->foreign('position')
            ->references('id')
            ->on('value')
            ->onDelete('cascade');
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
        Schema::dropIfExists('firstteam');
    }
}
