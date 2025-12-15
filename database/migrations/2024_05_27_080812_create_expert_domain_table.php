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
        Schema::create('expert_domain', function (Blueprint $table) {
            $table->id('E_ID')->primary();
            $table->bigInteger('P_ID')->unsigned();
            $table->foreign('P_ID')->references('P_ID')->on('platinum')->onDelete('cascade');
            $table->string('E_Name');
            $table->string('E_Title');
            $table->string('E_Email');
            $table->string('E_Position');
            $table->string('E_Workplace');
            $table->json('E_Qualification');
            $table->string('E_Photo')->nullable();
            $table->string('E_CategoryExpertise')->nullable();
            $table->json('E_GroupExpertise')->nullable();
            $table->json('E_AreaExpertise')->nullable();
            $table->json('E_ResearchTitle');
            $table->json('E_DurationStart')->nullable();
            $table->json('E_DurationEnd')->nullable();
            $table->json('E_Agent')->nullable();
            $table->json('E_Role')->nullable();
            $table->json('E_Cost')->nullable();
            $table->json('E_Status')->nullable();
            $table->json('E_PublicationTitle');
            $table->json('E_Authors')->nullable();
            $table->json('E_PublicationDate')->nullable();
            $table->json('E_Source')->nullable();
            $table->json('E_Volume')->nullable();
            $table->json('E_Pages')->nullable();
            $table->json('E_Publisher')->nullable();
            $table->json('E_Link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_domain');
    }
};