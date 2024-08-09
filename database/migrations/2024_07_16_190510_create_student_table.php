<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('studentID');
            $table->string('name');
            $table->string('fatherName');
            $table->string('cnic');
            $table->string('email');
            $table->string('mobileNo');
            $table->string('address');
            $table->string('qualification');
            $table->string('degree');
            $table->string('passingYear');
            $table->string('experience');
            $table->string('currentlyWorking');
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
        Schema::dropIfExists('student');
    }
}
