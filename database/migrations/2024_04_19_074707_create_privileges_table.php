<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id('privilegeID');
            $table->foreignId('moduleID')->constrained('modules','moduleID');
            $table->foreignId('accessLevelID')->constrained('accessLevel','accessLevelID');
            $table->string('privilegeCode');
            $table->string('privilegeName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
