<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolePrivilege', function (Blueprint $table) {
            $table->foreignId('roleID')->constrained('roles','roleID');
            $table->foreignId('privilegeID')->constrained('privileges','privilegeID');
            $table->primary(['roleID','privilegeID']);
            $table->timestamp('dateCreated')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolePrivilege');
    }
}
