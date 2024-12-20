<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id('eventID');
            $table->string('title');
            $table->string('label');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->boolean('allDay')->default(0);
            $table->string('eventUrl')->nullable();
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->string('googleEventID')->nullable();
            $table->foreignId('userID')->constrained('users', 'userID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
