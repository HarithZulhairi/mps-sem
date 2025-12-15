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
        Schema::create('platinum', function (Blueprint $table) {
            $table->id('P_ID')->primary();
            $table->integer('user_id');
            $table->string('P_Name');
            $table->string('P_IC');
            $table->string('P_Gender');
            $table->string('P_Religion');
            $table->string('P_Race');
            $table->string('P_Citizenship');
            $table->string('P_Address');
            $table->string('P_PhoneNum');
            $table->string('P_Email');
            $table->string('P_FBName')->nullable();
            $table->string('P_EduLevel');
            $table->string('P_EduField');
            $table->string('P_EduInst');
            $table->string('P_Occupation');
            $table->string('P_Stud_Sponsor')->nullable();
            $table->string('P_Batch');
            $table->string('P_Referral')->nullable();
            $table->string('P_RefName')->nullable();
            $table->string('P_RefBatch')->nullable();
            $table->date('P_DOApp');
            $table->string('P_Picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platinum');
    }
};
