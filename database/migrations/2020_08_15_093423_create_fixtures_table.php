<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->string('club_1')->nullable();
            $table->string('club_2')->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('venue')->nullable();
            $table->string('club1_score')->nullable();
            $table->string('club2_score')->nullable();
            $table->string('club1_result')->nullable();     
            $table->string('club2_result')->nullable();
            $table->enum('match_status', ['Played', 'Not Played', 'Delay', 'Playing']);
            $table->foreign('tournament_id')
            ->references('id')
            ->on('tournament')
            ->onDelete('cascade');
            $table->foreign('venue')
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
        Schema::dropIfExists('fixtures');
    }
}
