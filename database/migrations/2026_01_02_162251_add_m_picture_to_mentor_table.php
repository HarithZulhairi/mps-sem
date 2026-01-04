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
        Schema::table('mentor', function (Blueprint $table) {
            $table->string('M_Picture')->nullable()->after('M_email'); // add profile picture column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('mentor', function (Blueprint $table) {
            $table->dropColumn('M_Picture');
        });
    }
};
