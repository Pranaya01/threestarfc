<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('designation');
            $table->string('profession')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->text('contribution')->nullable();
            $table->string('image')->nullable();
            $table->foreign('designation')
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
        Schema::dropIfExists('board');
    }
}
