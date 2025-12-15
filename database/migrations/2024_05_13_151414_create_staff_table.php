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
        Schema::create('staff', function (Blueprint $table) {
        $table->id('S_ID')->primary();
        $table->integer('user_id');
        $table->string('S_name');
        $table->string('S_IC');
        $table->string('S_gender');
        $table->string('S_address');
        $table->string('S_phoneNum');
        $table->string('S_email');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
