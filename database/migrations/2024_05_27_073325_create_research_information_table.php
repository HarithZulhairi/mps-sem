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
        Schema::create('research_information', function (Blueprint $table) {
            $table->id('RI_ID');
            $table->bigInteger('P_ID')->unsigned();
            $table->foreign('P_ID')->references('P_ID')->on('platinum')->onDelete('cascade');
            $table->string('RI_title');
            $table->string('RI_author');
            $table->string('RI_area');
            $table->text('RI_objective');
            $table->text('RI_methodology');
            $table->text('RI_background');
            $table->string('RI_timeline');
            $table->string('RI_budget');
            $table->text('RI_outcome');
            $table->text('RI_abstract');
            $table->text('RI_reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_information');
    }
};
