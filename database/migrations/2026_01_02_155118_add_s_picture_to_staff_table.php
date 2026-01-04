<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('staff', function (Blueprint $table) {
        $table->string('S_Picture')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('staff', function (Blueprint $table) {
        $table->dropColumn('S_Picture');
    });
}

};
