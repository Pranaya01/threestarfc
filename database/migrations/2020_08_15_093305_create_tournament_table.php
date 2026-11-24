<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name')->nullable();
            $table->unsignedBigInteger('tournament_type')->nullable();
            $table->string('season')->nullable();
            $table->string('venue')->nullable();
            $table->foreign('tournament_type')
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
        Schema::dropIfExists('tournament');
    }
}
