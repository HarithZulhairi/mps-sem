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
        Schema::create('publications', function (Blueprint $table) {
            $table->id('Pb_ID');
            $table->bigInteger('P_ID')->unsigned();
            $table->foreign('P_ID')->references('P_ID')->on('platinum')->onDelete('cascade');
            $table->bigInteger('RI_ID')->unsigned();
            $table->foreign('RI_ID')->references('RI_ID')->on('research_information')->onDelete('cascade');
            $table->unsignedBigInteger('E_ID')->nullable();
            $table->foreign('E_ID')->references('E_ID')->on('expert_domain')->onDelete('cascade');
            $table->string('Pb_type');
            $table->string('Pb_title');
            $table->string('Pb_authors');
            $table->string('Pb_belongs');
            $table->date('Pb_date');
            $table->string('Pb_DOI')->nullable();
            $table->text('Pb_abstract')->nullable();
            $table->string('Pb_file_path')->nullable();
            $table->boolean('Pb_peer')->default(false);
            $table->string('Pb_journalName')->nullable();
            $table->string('Pb_volume')->nullable();
            $table->string('Pb_issue')->nullable();
            $table->string('Pb_page')->nullable();
            $table->string('Pb_conferenceName')->nullable();
            $table->string('Pb_conf_volume')->nullable();
            $table->string('Pb_conf_issue')->nullable();
            $table->string('Pb_conf_location')->nullable();
            $table->string('Pb_existingDOI')->nullable();
            $table->string('Pb_refers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
