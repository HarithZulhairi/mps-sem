<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mentor', function (Blueprint $table) {
            $table->id('M_ID')->primary();
            $table->integer('user_id');
            $table->string('M_name');
            $table->string('M_IC');
            $table->string('M_gender');
            $table->string('M_address');
            $table->string('M_phoneNum');
            $table->string('M_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor');
    }
};
